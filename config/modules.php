<?php

return [
    'core' => ['name' => 'Business foundation', 'dependencies' => [], 'required' => true],
    'products' => ['name' => 'Product catalog', 'dependencies' => ['core'], 'required' => true],
    'inventory' => ['name' => 'Stock ledger', 'dependencies' => ['products'], 'required' => true],
    'sales' => ['name' => 'Retail checkout', 'dependencies' => ['inventory'], 'required' => false],
    'reports' => ['name' => 'Sales reporting', 'dependencies' => ['sales'], 'required' => false],
];
