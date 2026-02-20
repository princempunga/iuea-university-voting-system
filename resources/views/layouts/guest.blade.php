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

    <!-- Force-hide browser native password reveal icon (Edge/Chrome/IE) -->
    <style>
        input::-ms-reveal,
        input::-ms-clear {
            display: none !important;
        }

        input[type="password"]::-webkit-credentials-auto-fill-button,
        input[type="password"]::-webkit-strong-password-auto-fill-button {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans text-charcoal antialiased bg-gray-100 selection:bg-iuea-red selection:text-white">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-6 sm:py-8">
        <div
            class="w-full sm:max-w-md bg-gray-50 shadow-premium border border-gray-200 sm:rounded-[2rem] relative overflow-hidden my-auto">
            <!-- Header Branding Section -->
            <div
                class="pt-6 pb-4 sm:pt-8 sm:pb-6 px-6 sm:px-10 flex flex-col items-center border-b border-gray-50 bg-gray-50/20">
                <a href="/" class="flex flex-col items-center group">
                    <x-application-logo
                        class="h-12 sm:h-14 w-auto object-contain transition-transform group-hover:scale-105 duration-500" />
                </a>
            </div>

            <!-- Form Content -->
            <div class="px-6 py-6 sm:px-10 sm:py-8 relative">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>