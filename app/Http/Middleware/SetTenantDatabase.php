<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\{Config,DB};
use App\Models\Company;


class SetTenantDatabase
{
    public function handle(Request $request, Closure $next): Response
    {
        $company = auth('company')->user();

        if ($company && $company->database) {
            // Dynamically set the tenant database
            Config::set('database.connections.tenant.database', $company->database);

            // Reconnect to apply the new DB
            DB::purge('tenant');
            DB::reconnect('tenant');
        }

        return $next($request);
    }
}
