<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventCmsIndexing
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($this->isCmsRequest($request)) {
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow, noarchive');
        }

        return $response;
    }

    private function isCmsRequest(Request $request): bool
    {
        return $request->is('admin', 'admin/*');
    }
}
