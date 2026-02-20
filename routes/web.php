<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\OtpVerificationController;

// ── Public ──────────────────────────────────────────────────────────────────
Route::get('/', [LandingPageController::class, 'index'])->name('welcome');
Route::get('/api/election-stats', [LandingPageController::class, 'stats'])->name('api.election-stats');

// ── Dashboard ────────────────────────────────────────────────────────────────
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ── OTP Verification (auth required, email NOT yet required) ─────────────────
Route::middleware('auth')->group(function () {
    Route::get('/verify-email', [OtpVerificationController::class, 'show'])->name('otp.show');
    Route::post('/verify-email', [OtpVerificationController::class, 'verify'])->name('otp.verify');
    Route::post('/verify-email/resend', [OtpVerificationController::class, 'resend'])->name('otp.resend');
});

// ── Student Voting (auth + email verified required) ──────────────────────────
Route::middleware(['auth', 'email.verified'])->group(function () {
    Route::get('/elections', [\App\Http\Controllers\Student\ElectionController::class, 'index'])->name('elections.index');
    Route::get('/elections/{election}', [\App\Http\Controllers\Student\ElectionController::class, 'show'])->name('elections.show');
    Route::post('/vote', [\App\Http\Controllers\VotingController::class, 'store'])->name('vote.store');
});

// ── Profile ──────────────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ── Admin ────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('elections', \App\Http\Controllers\Admin\ElectionController::class);
    Route::resource('candidates', \App\Http\Controllers\Admin\CandidateController::class);
    Route::get('/students', [\App\Http\Controllers\Admin\StudentController::class, 'index'])->name('students.index');
    Route::get('/results/{election}', [\App\Http\Controllers\Admin\ResultsController::class, 'show'])->name('results.show');
    Route::get('/intelligence/analytics', [\App\Http\Controllers\Admin\IntelligenceController::class, 'analytics'])->name('intelligence.analytics');
    Route::get('/intelligence/logs', [\App\Http\Controllers\Admin\IntelligenceController::class, 'logs'])->name('intelligence.logs');
});

require __DIR__ . '/auth.php';
