<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\OtpVerificationService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        // Rate-limit: max 5 registration attempts per IP in 15 minutes
        $key = 'register:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()
                ->withInput()
                ->withErrors(['registration_number' => "Too many registration attempts. Please try again in {$seconds} seconds."]);
        }

        RateLimiter::hit($key, 900); // 15 minutes decay

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'registration_number' => strtoupper($request->registration_number),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Send OTP immediately after registration
        app(OtpVerificationService::class)->generateAndStore($user);

        Auth::login($user);

        // Redirect to OTP verification step (not dashboard yet)
        return redirect()->route('otp.show')
            ->with('info', 'Your account was created. Please verify your email with the OTP code we just sent.');
    }
}
