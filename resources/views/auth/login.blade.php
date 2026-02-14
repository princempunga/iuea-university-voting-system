<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-black text-charcoal tracking-tight">Identity Verification</h2>
        <p class="text-xs text-gray-400 font-medium">Please enter your credentials.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Institutional Email')" class="text-[0.65rem] mb-1" />
            <x-text-input id="email" class="block w-full py-2.5" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" placeholder="s.name@student.iuea.ac.ug" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div x-data="{ show: false }">
            <div class="flex justify-between items-center mb-1">
                <x-input-label for="password" :value="__('Security Password')" class="text-[0.65rem] mb-0" />
                @if (Route::has('password.request'))
                    <a class="text-[0.6rem] font-extrabold uppercase tracking-widest text-iuea-red hover:text-iuea-red-light transition"
                        href="{{ route('password.request') }}">
                        {{ __('Recover') }}
                    </a>
                @endif
            </div>

            <div class="relative group">
                <x-text-input id="password"
                    class="block w-full py-2.5 pr-12 focus:border-iuea-red focus:ring-iuea-red/10"
                    ::type="show ? 'text' : 'password'" name="password" required autocomplete="current-password"
                    placeholder="••••••••" />

                <div class="absolute inset-y-0 right-0 pr-6 flex items-center">
                    <button type="button" @click="show = !show"
                        class="text-gray-400 hover:text-iuea-red transition-all duration-300 focus:outline-none">
                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.225 0 2.37.218 3.425.614m1.85 1.85A10.07 10.07 0 0121.542 12c-1.274 4.057-5.064 7-9.542 7-1.225 0-2.37-.218-3.425-.614M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox"
                class="w-4 h-4 text-iuea-red border-gray-200 rounded focus:ring-iuea-red/20 transition-all"
                name="remember">
            <span
                class="ms-2 text-[0.65rem] font-bold text-gray-400 uppercase tracking-widest cursor-pointer select-none"
                onclick="document.getElementById('remember_me').click()">{{ __('Maintain Session') }}</span>
        </div>

        <div class="pt-2">
            <x-primary-button class="py-3.5">
                {{ __('Authorize Access') }}
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <div class="text-center pt-4 border-t border-gray-50 flex items-center justify-between">
                <p class="text-[0.6rem] text-gray-400 font-bold uppercase tracking-widest">New Student?</p>
                <a href="{{ route('register') }}"
                    class="text-[0.7rem] font-black text-iuea-red hover:text-charcoal transition uppercase tracking-tighter">Create
                    Account</a>
            </div>
        @endif
    </form>
</x-guest-layout>