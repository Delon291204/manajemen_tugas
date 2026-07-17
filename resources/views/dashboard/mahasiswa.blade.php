<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight tracking-tight">
            Dashboard Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Welcome Card --}}
            <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-600 to-blue-600 rounded-2xl shadow-lg shadow-indigo-200/50 p-8 text-white mb-8">

                {{-- Decorative soft glass shapes --}}
                <div class="pointer-events-none absolute -top-10 -right-10 w-56 h-56 bg-white/10 rounded-full blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-16 -left-10 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>

                <div class="relative flex items-center gap-4">

                    <div class="hidden sm:flex items-center justify-center w-14 h-14 rounded-2xl bg-white/15 backdrop-blur-sm ring-1 ring-white/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.905 59.905 0 0 1 12 3.493a59.902 59.902 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443" />
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold tracking-tight">
                            Selamat Datang, {{ auth()->user()->name }}
                        </h2>

                        <p class="mt-1.5 text-indigo-100/90 text-sm sm:text-base">
                            Selamat belajar. Jangan lupa menyelesaikan seluruh tugas sebelum deadline.
                        </p>
                    </div>

                </div>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>

                    <p class="text-slate-500 mt-4 text-sm font-medium">
                        Mata Kuliah
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-1">

                        {{ $totalMataKuliah }}

                    </h2>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-blue-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </div>

                    <p class="text-slate-500 mt-4 text-sm font-medium">
                        Total Tugas
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-1">

                        {{ $totalTugas }}

                    </h2>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </div>

                    <p class="text-slate-500 mt-4 text-sm font-medium">
                        Sudah Dikumpulkan
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-1">

                        {{ $sudahDikumpulkan }}

                    </h2>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-amber-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <p class="text-slate-500 mt-4 text-sm font-medium">
                        Belum Dikumpulkan
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-1">

                        {{ $belumDikumpulkan }}

                    </h2>

                </div>

            </div>

            {{-- Konten --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

                {{-- Ringkasan Nilai --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">

                    <h3 class="text-lg font-semibold text-slate-800 mb-5 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                        Ringkasan Nilai
                    </h3>

                    <p class="text-slate-500 text-sm font-medium">

                        Rata-rata Nilai

                    </p>

                    <h2 class="text-6xl font-bold text-emerald-600 mt-3 tracking-tight">

                        {{ number_format($rataRataNilai ?? 0, 2) }}

                    </h2>

                    <p class="text-sm text-slate-400 mt-4 leading-relaxed">

                        Nilai dihitung dari seluruh tugas yang telah dinilai dosen.

                    </p>

                </div>

                {{-- Deadline --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">

                    <h3 class="text-lg font-semibold text-slate-800 mb-5 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Deadline Terdekat
                    </h3>

                    @forelse($deadlineTerdekat as $tugas)

                        <div class="border-l-2 border-red-200 pl-4 py-3 mb-1 hover:bg-slate-50 rounded-r-lg transition-colors duration-150">

                            <div class="flex justify-between items-start gap-3">

                                <div>

                                    <p class="font-semibold text-slate-800">

                                        {{ $tugas->judul_tugas }}

                                    </p>

                                    <p class="text-sm text-slate-500 mt-0.5">

                                        {{ $tugas->mataKuliah->nama_mk }}

                                    </p>

                                </div>

                                <span class="shrink-0 inline-flex items-center bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-medium ring-1 ring-red-100">

                                    {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M') }}

                                </span>

                            </div>

                            <p class="text-xs text-slate-400 mt-2">

                                Deadline :

                                {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y H:i') }}

                            </p>

                        </div>

                    @empty

                        <div class="text-center py-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-slate-300 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p class="text-slate-400 text-sm">
                                Tidak ada deadline.
                            </p>
                        </div>

                    @endforelse

                </div>

            </div>

            {{-- Menu Cepat --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 mt-8">

                <h3 class="text-lg font-semibold text-slate-800 mb-5 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5 9 3l-3.75 9h4.5L9 21l9-10.5h-4.5l3.75-9-9 10.5H3.75Z" />
                    </svg>
                    Menu Cepat
                </h3>

                <div class="flex flex-wrap gap-4">

                    <a href="/mata-kuliah-mahasiswa"
                       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition-colors duration-150 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-sm shadow-indigo-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        Mata Kuliah Saya
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>