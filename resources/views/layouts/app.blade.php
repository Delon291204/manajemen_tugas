<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>SIM Manajemen Tugas</title>

    <!-- Font -->

    <link rel="preconnect"
          href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet" />

    <!-- CSS & JS -->

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="font-sans antialiased bg-slate-50 text-slate-900">

    <div class="min-h-screen">

        {{-- Navbar --}}
        @include('layouts.navigation')

        {{-- Header --}}
        @isset($header)

            <header class="bg-white border-b border-slate-200">

                <div class="max-w-7xl mx-auto px-6 py-6">

                    <div class="text-xl font-semibold tracking-tight text-slate-900">

                        {{ $header }}

                    </div>

                </div>

            </header>

        @endisset

        {{-- Content --}}
        <main>

            {{ $slot }}

        </main>

    </div>

</body>

</html>