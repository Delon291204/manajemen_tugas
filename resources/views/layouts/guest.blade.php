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

<body class="font-sans antialiased bg-slate-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            {{-- Logo / Judul --}}
            <div class="text-center mb-8">

                <div class="text-6xl mb-3">
                    🎓
                </div>

                <h1 class="text-3xl font-bold text-indigo-600">

                    SIM Manajemen Tugas

                </h1>

                <p class="text-gray-500 mt-2">

                    Sistem Informasi Manajemen Tugas Mahasiswa

                </p>

            </div>

            {{-- Card Login --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>