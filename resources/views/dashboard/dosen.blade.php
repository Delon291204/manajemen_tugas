<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
            </svg>
            Dashboard Dosen
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>

                    <p class="text-slate-500 mt-4 text-sm font-medium">
                        Total Mata Kuliah
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                        </svg>
                    </div>

                    <p class="text-slate-500 mt-4 text-sm font-medium">
                        Total Pengumpulan
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-1">

                        {{ $totalPengumpulan }}

                    </h2>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-amber-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <p class="text-slate-500 mt-4 text-sm font-medium">
                        Belum Dinilai
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-1">

                        {{ $belumDinilai }}

                    </h2>

                </div>

            </div>

            {{-- Tugas & Pengumpulan --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">

                    <h3 class="text-lg font-semibold text-slate-800 mb-5 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        5 Tugas Terbaru
                    </h3>

                    @forelse($tugasTerbaru as $tugas)

                        <div class="border-l-2 border-slate-100 pl-4 py-3 hover:bg-slate-50 hover:border-indigo-300 rounded-r-lg transition-colors duration-150">

                            <p class="font-semibold text-slate-800">

                                {{ $tugas->judul_tugas }}

                            </p>

                            <p class="text-sm text-slate-500 mt-0.5">

                                {{ $tugas->mataKuliah->nama_mk }}

                            </p>

                            <span class="inline-flex items-center gap-1.5 mt-2 bg-red-50 text-red-600 px-2.5 py-1 rounded-full text-xs font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Deadline : {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y H:i') }}
                            </span>

                        </div>

                    @empty

                        <p class="text-slate-400 text-sm text-center py-6">

                            Belum ada tugas.

                        </p>

                    @endforelse

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">

                    <h3 class="text-lg font-semibold text-slate-800 mb-5 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                        </svg>
                        5 Pengumpulan Terbaru
                    </h3>

                    @forelse($pengumpulanTerbaru as $item)

                        <div class="border-l-2 border-slate-100 pl-4 py-3 hover:bg-slate-50 hover:border-indigo-300 rounded-r-lg transition-colors duration-150">

                            <p class="font-semibold text-slate-800">

                                {{ $item->mahasiswa->name }}

                            </p>

                            <p class="text-sm text-slate-500 mt-0.5">

                                {{ $item->tugas->judul_tugas }}

                            </p>

                            <p class="mt-2">

                                @if($item->nilai)

                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full text-xs font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Nilai : {{ $item->nilai }}
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-600 px-2.5 py-1 rounded-full text-xs font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        Belum Dinilai
                                    </span>

                                @endif

                            </p>

                        </div>

                    @empty

                        <p class="text-slate-400 text-sm text-center py-6">

                            Belum ada pengumpulan.

                        </p>

                    @endforelse

                </div>

            </div>

            {{-- Ringkasan & Menu --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">

                    <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                        Ringkasan Penilaian
                    </h3>

                    <div class="space-y-3">

                        <div class="flex justify-between items-center py-2 border-b border-slate-50">

                            <span class="inline-flex items-center gap-2 text-slate-600 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Sudah Dinilai
                            </span>

                            <strong class="text-emerald-600 text-lg">

                                {{ $sudahDinilai }}

                            </strong>

                        </div>

                        <div class="flex justify-between items-center py-2">

                            <span class="inline-flex items-center gap-2 text-slate-600 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Belum Dinilai
                            </span>

                            <strong class="text-amber-600 text-lg">

                                {{ $belumDinilai }}

                            </strong>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">

                    <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5 9 3l-3.75 9h4.5L9 21l9-10.5h-4.5l3.75-9-9 10.5H3.75Z" />
                        </svg>
                        Menu Cepat
                    </h3>

                    <div class="flex flex-wrap gap-3">

                        <a href="/mata-kuliah"
                           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition-colors duration-150 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-sm shadow-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                            Mata Kuliah
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>