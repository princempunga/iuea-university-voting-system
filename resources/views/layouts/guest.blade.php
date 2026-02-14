<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans text-charcoal antialiased bg-off-white selection:bg-iuea-red selection:text-white overflow-hidden">
    <div class="min-h-screen flex flex-col justify-center items-center px-4">
        <div
            class="w-full sm:max-w-md bg-white shadow-premium border border-gray-100 sm:rounded-[2rem] relative overflow-hidden">
            <!-- Header Branding Section -->
            <div class="pt-8 pb-6 px-10 flex flex-col items-center border-b border-gray-50 bg-gray-50/20">
                <a href="/" class="flex flex-col items-center group">
                    <x-application-logo
                        class="h-14 w-auto object-contain transition-transform group-hover:scale-105 duration-500" />
                </a>
            </div>

            <!-- Form Content -->
            <div class="px-10 py-8 relative">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>