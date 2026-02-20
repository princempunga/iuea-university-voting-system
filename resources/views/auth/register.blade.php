<x-guest-layout>
    <div class="mb-4 sm:mb-6 text-center">
        <h2 class="text-lg sm:text-xl font-black text-charcoal tracking-tight">Student Enrollment</h2>
        <p class="text-[0.6rem] text-gray-400 font-bold uppercase tracking-widest mt-1">Institutional Registration</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3 sm:space-y-4">
        @csrf

        <!-- Institutional Identity Group -->
        <div class="space-y-3">
            <div class="flex items-center space-x-2 pb-1 border-b border-gray-50">
                <div class="h-3 w-1 bg-iuea-red rounded-full"></div>
                <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Identity</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" class="text-[0.65rem] mb-1" />
                    <x-text-input id="name" class="block w-full py-2.5 text-sm" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Registration Number -->
                <div>
                    <x-input-label for="registration_number" :value="__('Reg #')" class="text-[0.65rem] mb-1" />
                    <x-text-input id="registration_number" class="block w-full py-2.5 text-sm" type="text"
                        name="registration_number" :value="old('registration_number')" required
                        placeholder="21/UG/123/BCS" />
                    <x-input-error :messages="$errors->get('registration_number')" class="mt-1" />
                </div>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Institutional Email')" class="text-[0.65rem] mb-1" />
                <x-text-input id="email" class="block w-full py-2.5 text-sm" type="email" name="email"
                    :value="old('email')" required autocomplete="username" placeholder="name@student.iuea.ac.ug" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>
        </div>

        <!-- Secure Credentials Group -->
        <div class="space-y-3 pt-1">
            <div class="flex items-center space-x-2 pb-1 border-b border-gray-50">
                <div class="h-3 w-1 bg-iuea-red rounded-full"></div>
                <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Security</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- Password -->
                <div x-data="{ show: false }">
                    <x-input-label for="password" :value="__('Password')" class="text-[0.65rem] mb-1" />
                    <div class="relative">
                        <x-text-input id="password"
                            class="block w-full py-2.5 text-sm pr-12 focus:border-iuea-red focus:ring-iuea-red/10"
                            ::type="show ? 'text' : 'password'" name="password" required autocomplete="new-password"
                            placeholder="••••••••" />

                        <div class="absolute inset-y-0 right-0 pr-6 flex items-center">
                            <button type="button" @click="show = !show"
                                class="text-gray-400 hover:text-iuea-red transition-all duration-300 focus:outline-none">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7-1.274-4.057-5.064-7 9.542-7 1.225 0 2.37.218 3.425.614m1.85 1.85A10.07 10.07 0 0121.542 12c-1.274 4.057-5.064 7-9.542 7-1.225 0-2.37-.218-3.425-.614M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Confirm Password -->
                <div x-data="{ show: false }">
                    <x-input-label for="password_confirmation" :value="__('Verify')" class="text-[0.65rem] mb-1" />
                    <div class="relative">
                        <x-text-input id="password_confirmation"
                            class="block w-full py-2.5 text-sm pr-12 focus:border-iuea-red focus:ring-iuea-red/10"
                            ::type="show ? 'text' : 'password'" name="password_confirmation" required
                            autocomplete="new-password" placeholder="••••••••" />

                        <div class="absolute inset-y-0 right-0 pr-6 flex items-center">
                            <button type="button" @click="show = !show"
                                class="text-gray-400 hover:text-iuea-red transition-all duration-300 focus:outline-none">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
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
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>
            </div>

            <div class="pt-3">
                <x-primary-button
                    class="w-full py-4 text-xs tracking-widest uppercase font-black shadow-xl shadow-iuea-red/20">
                    {{ __('Securely Enroll Now') }}
                </x-primary-button>
            </div>

            <div class="text-center pt-4 border-t border-gray-50 flex items-center justify-between">
                <p class="text-[0.6rem] text-gray-400 font-bold uppercase tracking-widest">Joined Before?</p>
                <a href="{{ route('login') }}"
                    class="text-[0.7rem] font-black text-iuea-red hover:text-charcoal transition uppercase tracking-tighter">Institutional
                    Login</a>
            </div>
    </form>
</x-guest-layout>