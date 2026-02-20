<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\OtpVerificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OtpVerificationController extends Controller
{
    public function __construct(private OtpVerificationService $otpService)
    {
    }

    /**
     * Show the OTP entry form.
     */
    public function show(): View|RedirectResponse
    {
        if (auth()->user()->email_verified_at) {
            return redirect()->route('dashboard');
        }

        return view('auth.otp-verify', [
            'remainingAttempts' => $this->otpService->remainingAttempts(auth()->user()),
            'isLocked' => $this->otpService->isLocked(auth()->user()),
        ]);
    }

    /**
     * Resend a fresh OTP code.
     */
    public function resend(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->email_verified_at) {
            return redirect()->route('dashboard');
        }

        // Rate-limit resend requests (max 3 per 10 minutes per user)
        $key = 'otp-resend:' . $user->id;

        if (\Illuminate\Support\Facades\RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn($key);
            return back()->withErrors(['otp' => "Too many resend requests. Wait {$seconds}s."]);
        }

        \Illuminate\Support\Facades\RateLimiter::hit($key, 600);

        $this->otpService->generateAndStore($user);

        return back()->with('info', 'A new verification code has been sent to ' . $user->email);
    }

    /**
     * Verify the submitted OTP code.
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'digits:6'],
        ]);

        $user = $request->user();
        $result = $this->otpService->verify($user, $request->otp);

        return match ($result) {
            'valid' => redirect()->route('dashboard')->with('success', 'Email verified! Welcome to the IUEA Voting Portal.'),
            'expired' => back()->withErrors(['otp' => 'This code has expired. Please request a new one.']),
            'locked' => back()->withErrors(['otp' => 'Account locked after too many failed attempts. Please contact support.']),
            default => back()->withErrors(['otp' => 'Invalid code. ' . $this->otpService->remainingAttempts($user) . ' attempt(s) remaining.']),
        };
    }
}
