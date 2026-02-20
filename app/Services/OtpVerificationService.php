<?php

namespace App\Services;

use App\Jobs\SendOtpEmailJob;
use App\Models\User;
use App\Models\EmailVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class OtpVerificationService
{
    const MAX_ATTEMPTS = 3;
    const EXPIRES_IN_MINUTES = 10;

    /**
     * Generate a secure 6-digit OTP, store its hash, and dispatch the email job.
     */
    public function generateAndStore(User $user): void
    {
        // Delete any previous pending OTP for this user
        EmailVerification::where('user_id', $user->id)->delete();

        // Generate a cryptographically secure 6-digit code
        $plainOtp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        EmailVerification::create([
            'user_id' => $user->id,
            'otp' => Hash::make($plainOtp),
            'attempts' => 0,
            'expires_at' => Carbon::now()->addMinutes(self::EXPIRES_IN_MINUTES),
        ]);

        // Dispatch job to send the email (sync in dev, queued in production)
        dispatch(new SendOtpEmailJob($user, $plainOtp));
    }

    /**
     * Verify a submitted OTP for a user.
     * Returns 'valid', 'invalid', 'expired', or 'locked'.
     */
    public function verify(User $user, string $submittedOtp): string
    {
        $record = EmailVerification::where('user_id', $user->id)
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if (!$record) {
            return 'invalid';
        }

        // Check if locked (too many attempts)
        if ($record->attempts >= self::MAX_ATTEMPTS) {
            return 'locked';
        }

        // Check expiry
        if (Carbon::now()->isAfter($record->expires_at)) {
            return 'expired';
        }

        // Check the code
        if (!Hash::check($submittedOtp, $record->otp)) {
            $record->increment('attempts');
            if ($record->attempts >= self::MAX_ATTEMPTS) {
                return 'locked';
            }
            return 'invalid';
        }

        // ✅ OTP is correct — mark as verified
        $record->update(['verified_at' => Carbon::now()]);

        $user->update(['email_verified_at' => Carbon::now()]);

        return 'valid';
    }

    /**
     * Check if user is currently locked (max attempts exceeded).
     */
    public function isLocked(User $user): bool
    {
        return EmailVerification::where('user_id', $user->id)
            ->whereNull('verified_at')
            ->where('attempts', '>=', self::MAX_ATTEMPTS)
            ->exists();
    }

    /**
     * Get remaining attempts for the user's latest OTP record.
     */
    public function remainingAttempts(User $user): int
    {
        $record = EmailVerification::where('user_id', $user->id)
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if (!$record) {
            return self::MAX_ATTEMPTS;
        }

        return max(0, self::MAX_ATTEMPTS - $record->attempts);
    }
}
