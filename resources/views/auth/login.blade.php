<x-guest-layout>

    @if(session('status'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700">
            {{ session('status') }}
        </div>
    @endif

    <div class="text-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">

            Login

        </h2>

        <p class="text-gray-500 mt-2">

            Silakan masuk menggunakan akun Anda.

        </p>

    </div>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        {{-- Email --}}
        <div class="mb-5">

            <label
                class="block text-sm font-medium text-gray-700 mb-2">

                Email

            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

            @error('email')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Password --}}
        <div class="mb-5">

            <label
                class="block text-sm font-medium text-gray-700 mb-2">

                Password

            </label>

            <input
                type="password"
                name="password"
                required
                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

            @error('password')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Remember --}}
        <div class="flex items-center justify-between mb-6">

            <label class="flex items-center gap-2">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">

                <span class="text-sm text-gray-600">

                    Ingat Saya

                </span>

            </label>

            @if(Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    class="text-sm text-indigo-600 hover:text-indigo-800">

                    Lupa Password?

                </a>

            @endif

        </div>

        {{-- Tombol --}}
        <button
            type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition">

            Login

        </button>

    </form>

</x-guest-layout>