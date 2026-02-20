<x-guest-layout>
    <div class="mb-4 sm:mb-6 text-center">
        <div class="mx-auto mb-3 w-12 h-12 rounded-full bg-iuea-red/10 flex items-center justify-center">
            <svg class="w-6 h-6 text-iuea-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        <h2 class="text-lg sm:text-xl font-black text-charcoal tracking-tight">Verify Your Email</h2>
        <p class="text-[0.6rem] text-gray-400 font-bold uppercase tracking-widest mt-1">Identity Confirmation</p>
    </div>

    {{-- Status / Info Messages --}}
    @if (session('info'))
        <div class="mb-4 px-4 py-3 rounded-xl bg-blue-50 border border-blue-100 text-xs text-blue-700 font-medium">
            {{ session('info') }}
        </div>
    @endif

    @if ($isLocked)
        <div class="mb-4 px-4 py-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700 font-semibold">
            🔒 Your verification has been locked due to too many failed attempts.
            Please contact the Electoral Commission or try again after some time.
        </div>
    @else
        <p class="text-xs text-gray-500 text-center mb-5 leading-relaxed">
            We sent a <strong>6-digit code</strong> to
            <span class="font-bold text-charcoal">{{ auth()->user()->email }}</span>.
            Enter it below to confirm your identity. The code expires in <strong>10 minutes</strong>.
        </p>

        <form method="POST" action="{{ route('otp.verify') }}" class="space-y-4">
            @csrf

            <div>
                <x-input-label for="otp" :value="__('Verification Code')" class="text-[0.65rem] mb-1" />
                <x-text-input id="otp"
                    class="block w-full py-3 text-center text-2xl font-black tracking-[0.5em] text-charcoal" type="text"
                    name="otp" inputmode="numeric" pattern="\d{6}" maxlength="6" autocomplete="one-time-code"
                    placeholder="— — — — — —" autofocus />
                <x-input-error :messages="$errors->get('otp')" class="mt-1 text-center" />

                @if ($remainingAttempts < 3 && $remainingAttempts > 0)
                    <p class="mt-1 text-center text-[0.65rem] font-bold text-amber-600">
                        ⚠ {{ $remainingAttempts }} attempt(s) remaining
                    </p>
                @endif
            </div>

            <x-primary-button class="w-full py-4 text-xs tracking-widest uppercase font-black shadow-xl shadow-iuea-red/20">
                {{ __('Confirm Identity') }}
            </x-primary-button>
        </form>

        <div class="mt-4 text-center border-t border-gray-50 pt-4">
            <p class="text-[0.6rem] text-gray-400 mb-2">Didn't receive the code?</p>
            <form method="POST" action="{{ route('otp.resend') }}">
                @csrf
                <button type="submit"
                    class="text-[0.7rem] font-black text-iuea-red hover:text-charcoal transition uppercase tracking-tighter">
                    Resend Code
                </button>
            </form>
        </div>
    @endif
</x-guest-layout>