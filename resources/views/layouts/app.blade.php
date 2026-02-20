<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('iuea-logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" x-data="{ sidebarOpen: false, loading: true }"
    x-init="setTimeout(() => loading = false, 500)">
    <!-- Global Institutional Loader -->
    <div x-show="loading"
        class="fixed inset-0 z-[1000] bg-white flex flex-col items-center justify-center transition-opacity duration-500"
        :class="{ 'opacity-0 pointer-events-none': !loading }">
        <div class="relative">
            <div class="w-16 h-16 border-4 border-gray-100 border-t-iuea-red rounded-full animate-spin"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <x-application-logo class="h-10 w-auto transition-all duration-700" />
            </div>
        </div>
        <p class="mt-6 text-[0.6rem] font-black text-charcoal uppercase tracking-[0.3em] animate-pulse">Establishing
            Secure Connection...</p>
    </div>

    <div class="min-h-screen bg-gray-100 flex overflow-hidden">
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative lg:ml-72">
            <!-- Unified Mobile Header -->
            <header class="lg:hidden bg-white border-b border-gray-100 p-4 flex items-center justify-between z-40">
                <div class="flex items-center space-x-3">
                    <x-application-logo class="h-8 w-auto" />
                    <span
                        class="text-[0.6rem] font-black text-iuea-red uppercase tracking-widest border-l border-gray-100 pl-3">Portal</span>
                </div>
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 text-gray-400 hover:text-charcoal transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </header>

            <div class="flex-1 overflow-y-auto outline-none custom-scrollbar">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white border-b border-gray-100">
                        <div class="max-w-7xl mx-auto py-6 px-6 lg:px-12">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="lg:px-6">
                    {{ $slot }}
                </main>
            </div>

            <!-- Admin Sidebar Backdrop (Mobile) -->
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
                class="fixed inset-0 bg-charcoal/60 backdrop-blur-sm z-40 lg:hidden"></div>

            <!-- Institutional Flash Notifications -->
            <div x-data="{ 
                show: false, 
                message: '', 
                type: 'success',
                timer: null,
                init() {
                    @if(session()->has('success'))
                        this.notify('{{ session('success') }}', 'success');
                    @elseif(session()->has('error'))
                        this.notify('{{ session('error') }}', 'error');
                    @endif
                },
                notify(msg, type) {
                    this.message = msg;
                    this.type = type;
                    this.show = true;
                    if(this.timer) clearTimeout(this.timer);
                    this.timer = setTimeout(() => { this.show = false }, 5000);
                }
            }" x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="fixed bottom-10 right-10 z-[200] max-w-sm w-full" style="display: none;">
                <div :class="{
                    'bg-white border-green-100 shadow-2xl shadow-green-900/10': type === 'success',
                    'bg-white border-red-100 shadow-2xl shadow-red-900/10': type === 'error'
                }" class="border rounded-2xl p-6 flex items-start space-x-4">
                    <div :class="{
                        'bg-green-50 text-green-600': type === 'success',
                        'bg-red-50 text-red-600': type === 'error'
                    }" class="p-2 rounded-xl">
                        <template x-if="type === 'success'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </template>
                        <template x-if="type === 'error'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </template>
                    </div>
                    <div class="flex-1">
                        <p class="text-[0.6rem] font-black uppercase tracking-[0.2em] mb-1"
                            :class="type === 'success' ? 'text-green-700' : 'text-red-700'"
                            x-text="type === 'success' ? 'Institutional Notice' : 'System Error'"></p>
                        <p class="text-sm font-bold text-charcoal leading-tight" x-text="message"></p>
                    </div>
                    <button @click="show = false" class="text-gray-300 hover:text-gray-400 p-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>