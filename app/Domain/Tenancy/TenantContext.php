<?php

namespace App\Domain\Tenancy;

use App\Models\User;

final class TenantContext
{
    private ?User $user = null;

    public function set(User $user): void
    {
        $this->user = $user;
    }

    public function id(): int
    {
        abort_unless($this->user?->tenant_id, 403, 'A business context is required.');

        return (int) $this->user->tenant_id;
    }
}
