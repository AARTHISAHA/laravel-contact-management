<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Throwable;

class AuthenticateJwtCookie
{
    public function handle(Request $request, Closure $next): Response {
        $token = $request->cookie('access_token');

        if (!$token) {
            return redirect()->route('login');
        }

        try {
            $user = JWTAuth::setToken($token)->authenticate();

            if (!$user) {
                return redirect()
                    ->route('login')
                    ->withCookie(cookie()->forget('access_token'));
            }

            // Make the authenticated user available to the request.
            $request->setUserResolver(fn () => $user);

        } catch (Throwable $e) {
            return redirect()
                ->route('login')
                ->withCookie(cookie()->forget('access_token'));
        }

        return $next($request);
    }
}