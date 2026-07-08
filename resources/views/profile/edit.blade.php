<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            👤 Profile
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white shadow-lg rounded-xl">

                <div class="border-b px-8 py-5">

                    <h3 class="text-xl font-semibold text-gray-800">

                        Informasi Akun

                    </h3>

                    <p class="text-gray-500 text-sm mt-1">

                        Perbarui nama dan alamat email akun Anda.

                    </p>

                </div>

                <div class="p-8">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>

            <div class="bg-white shadow-lg rounded-xl">

                <div class="border-b px-8 py-5">

                    <h3 class="text-xl font-semibold text-gray-800">

                        Ubah Password

                    </h3>

                    <p class="text-gray-500 text-sm mt-1">

                        Gunakan password yang kuat untuk menjaga keamanan akun.

                    </p>

                </div>

                <div class="p-8">

                    @include('profile.partials.update-password-form')

                </div>

            </div>

            <div class="bg-white shadow-lg rounded-xl border border-red-200">

                <div class="border-b border-red-200 px-8 py-5">

                    <h3 class="text-xl font-semibold text-red-600">

                        Hapus Akun

                    </h3>

                    <p class="text-gray-500 text-sm mt-1">

                        Tindakan ini bersifat permanen dan tidak dapat dibatalkan.

                    </p>

                </div>

                <div class="p-8">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>

        </div>

    </div>

</x-app-layout>