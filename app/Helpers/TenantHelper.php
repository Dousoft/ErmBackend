<?php

namespace App\Helpers;

use Illuminate\Support\Facades\{Http,Config,DB};

class TenantHelper
{
    public function setTenantDatabase(string $databaseName)
    {
        Config::set('database.connections.tenant.database', $databaseName);
        DB::purge('tenant'); // Clear previous connection cache
        DB::reconnect('tenant'); // Reconnect with new DB
    }
}
