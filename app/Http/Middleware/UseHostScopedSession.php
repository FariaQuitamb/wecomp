<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UseHostScopedSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->isPrimaryDomain($request->getHost())) {
            config(['session.domain' => null]);
        }

        return $next($request);
    }

    private function isPrimaryDomain(string $host): bool
    {
        $host = strtolower($host);
        $primary = strtolower((string) config('app.primary_domain', 'wecomp.ao'));

        return $host === $primary || str_ends_with($host, '.'.$primary);
    }
}
