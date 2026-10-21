<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ])
                ->onlyInput('email');
        }

        $cookie = cookie(
            'access_token',
            $token,
            config('jwt.ttl', 60),
            '/',
            null,
            false,  // Use HTTPS in production
            true,   // HttpOnly
            false,
            'lax'
        );

        return redirect()
            ->route('dashboard')
            ->withCookie($cookie);
    }

    public function dashboard(Request $request)
    {
        return view('dashboard', [
            'user' => $request->user(),
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('access_token');

        if ($token) {
            try {
                JWTAuth::setToken($token)->invalidate();
            } catch (JWTException $e) {
                // The token may already be expired or invalid.
            }
        }

        return redirect()
            ->route('login')
            ->withCookie(Cookie::forget('access_token'));
    }
}