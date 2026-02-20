<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailVerified
{
    /**
     * Block access to student voting pages if the user has not verified their email via OTP.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (!$user->email_verified_at) {
            return redirect()->route('otp.show')
                ->with('warning', 'Please verify your email before accessing the voting portal.');
        }

        return $next($request);
    }
}
