<x-guest-layout>

    @if(session('status'))
        <div class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 flex items-center gap-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-sm font-medium">
                {{ session('status') }}
            </p>
        </div>
    @endif

    <div class="text-center mb-8">

        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-50 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">

            Login

        </h2>

        <p class="text-slate-500 mt-2 text-sm">

            Silakan masuk menggunakan akun Anda.

        </p>

    </div>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        {{-- Email --}}
        <div class="mb-5">

            <label
                class="block text-sm font-semibold text-slate-700 mb-2">

                Email

            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="w-full rounded-xl border-slate-200 text-slate-700 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-shadow duration-150">

            @error('email')

                <p class="text-red-500 text-sm mt-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    {{ $message }}
                </p>

            @enderror

        </div>

        {{-- Password --}}
        <div class="mb-5">

            <label
                class="block text-sm font-semibold text-slate-700 mb-2">

                Password

            </label>

            <input
                type="password"
                name="password"
                required
                class="w-full rounded-xl border-slate-200 text-slate-700 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-shadow duration-150">

            @error('password')

                <p class="text-red-500 text-sm mt-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    {{ $message }}
                </p>

            @enderror

        </div>

        {{-- Remember --}}
        <div class="flex items-center justify-between mb-7">

            <label class="flex items-center gap-2 cursor-pointer">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500/30 focus:ring-2">

                <span class="text-sm text-slate-600">

                    Ingat Saya

                </span>

            </label>

            @if(Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors duration-150">

                    Lupa Password?

                </a>

            @endif

        </div>

        {{-- Tombol --}}
        <button
            type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold py-3 rounded-xl shadow-sm shadow-indigo-200 transition-colors duration-150">

            Login

        </button>

    </form>

</x-guest-layout>