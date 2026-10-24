<?php

namespace App\Domain\Modules;

use App\Domain\Tenancy\TenantContext;
use App\Models\AuditLog;
use App\Models\Tenant;
use App\Models\TenantModule;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class ModuleManager
{
    public function isEnabled(string $module): bool
    {
        $definition = config("modules.$module");
        if (! $definition) {
            return false;
        }

        return ($definition['required'] ?? false) || (bool) TenantModule::where('module', $module)->value('enabled');
    }

    public function set(string $module, bool $enabled, int $userId): void
    {
        DB::transaction(function () use ($module, $enabled, $userId) {
            // Serialize settings with checkout by locking the tenant row first.
            Tenant::whereKey(app(TenantContext::class)->id())->lockForUpdate()->firstOrFail();
            $definition = config("modules.$module");
            if (! $definition || (! $enabled && ($definition['required'] ?? false))) {
                throw ValidationException::withMessages(['module' => 'This module cannot be changed.']);
            }
            if ($enabled) {
                foreach ($definition['dependencies'] as $dependency) {
                    if (! $this->isEnabled($dependency)) {
                        throw ValidationException::withMessages(['module' => "Enable $dependency first."]);
                    }
                }
            }
            if (! $enabled) {
                foreach (config('modules') as $key => $candidate) {
                    if (in_array($module, $candidate['dependencies'], true) && $this->isEnabled($key)) {
                        throw ValidationException::withMessages(['module' => "Disable $key first."]);
                    }
                }
            }
            TenantModule::updateOrCreate(['module' => $module], ['enabled' => $enabled]);
            AuditLog::create(['user_id' => $userId, 'action' => 'module.changed', 'context' => json_encode(compact('module', 'enabled')), 'created_at' => now()]);
        });
    }
}
