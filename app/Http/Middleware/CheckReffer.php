<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckReffer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedDomain = '127.0.0.1';
        $referer =  $request->getHost();
        if ($referer && strpos($referer, $allowedDomain) !== false) {
            return $next($request);
        }
        abort(403, 'Unauthorized access.');
    }
}
