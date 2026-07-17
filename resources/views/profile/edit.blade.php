<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            Profile
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">

                <div class="border-b border-slate-100 px-8 py-5 flex items-center gap-3">

                    <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-indigo-50 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-slate-800 tracking-tight">

                            Informasi Akun

                        </h3>

                        <p class="text-slate-500 text-sm mt-0.5">

                            Perbarui nama dan alamat email akun Anda.

                        </p>
                    </div>

                </div>

                <div class="p-8">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">

                <div class="border-b border-slate-100 px-8 py-5 flex items-center gap-3">

                    <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-indigo-50 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-slate-800 tracking-tight">

                            Ubah Password

                        </h3>

                        <p class="text-slate-500 text-sm mt-0.5">

                            Gunakan password yang kuat untuk menjaga keamanan akun.

                        </p>
                    </div>

                </div>

                <div class="p-8">

                    @include('profile.partials.update-password-form')

                </div>

            </div>

            <div class="bg-white rounded-2xl border border-red-100 shadow-sm">

                <div class="border-b border-red-100 bg-red-50/30 rounded-t-2xl px-8 py-5 flex items-center gap-3">

                    <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-red-50 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-red-600 tracking-tight">

                            Hapus Akun

                        </h3>

                        <p class="text-slate-500 text-sm mt-0.5">

                            Tindakan ini bersifat permanen dan tidak dapat dibatalkan.

                        </p>
                    </div>

                </div>

                <div class="p-8">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>

        </div>

    </div>

</x-app-layout>