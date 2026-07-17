<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>SIM Manajemen Tugas</title>

    <link rel="preconnect"
          href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="font-sans antialiased text-slate-900">

    <div class="relative min-h-screen flex items-center justify-center px-4 overflow-hidden bg-gradient-to-b from-slate-50 via-white to-indigo-50/40">

        {{-- Ambient background pattern --}}
        <div class="pointer-events-none absolute inset-0 opacity-[0.4]"
             style="background-image: radial-gradient(circle, #e2e8f0 1px, transparent 1px); background-size: 28px 28px;">
        </div>

        <div class="pointer-events-none absolute -top-24 -right-24 w-72 h-72 rounded-full bg-indigo-200/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-indigo-100/40 blur-3xl"></div>

        <div class="relative w-full max-w-md">

            {{-- Logo / Judul --}}
            <div class="text-center mb-8">

                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-600 shadow-lg shadow-indigo-600/25 mb-5">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>

                </div>

                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">

                    SIM Manajemen Tugas

                </h1>

                <p class="text-slate-500 text-sm mt-2">

                    Sistem Informasi Manajemen Tugas Mahasiswa

                </p>

            </div>

            {{-- Card Login --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_8px_30px_rgba(15,23,42,0.06)] p-8">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>