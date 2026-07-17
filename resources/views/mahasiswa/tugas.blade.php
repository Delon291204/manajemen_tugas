<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="font-semibold text-2xl text-slate-800 leading-tight tracking-tight flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    {{ $mataKuliah->nama_mk }}
                </h2>

                <div class="mt-2 flex flex-wrap gap-2">

                    <span class="inline-flex items-center bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full text-xs font-medium">
                        {{ $mataKuliah->kode_mk }}
                    </span>

                    <span class="inline-flex items-center bg-slate-100 text-slate-600 px-2.5 py-1 rounded-full text-xs font-medium">
                        Semester {{ $mataKuliah->semester }}
                    </span>

                </div>

            </div>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($tugas->count()==0)

                <div class="bg-white rounded-2xl border border-dashed border-slate-200 p-12 text-center">

                    <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-slate-50 mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-semibold text-slate-700">
                        Belum ada tugas.
                    </h3>

                </div>

            @else

                <div class="space-y-6">

                    @foreach($tugas as $item)

                        @php

                            $pengumpulan = $pengumpulanSaya
                                ->where('id_tugas', $item->id)
                                ->first();

                        @endphp

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-200">

                            <div class="p-6">

                                <div class="flex justify-between items-start gap-4">

                                    <div>

                                        <h3 class="text-lg font-bold text-slate-800 tracking-tight">

                                            {{ $item->judul_tugas }}

                                        </h3>

                                        <p class="text-slate-500 mt-2 text-sm leading-relaxed">

                                            {{ $item->deskripsi }}

                                        </p>

                                    </div>

                                    <span class="shrink-0 inline-flex flex-col items-center gap-1 bg-red-50 text-red-600 px-3 py-2 rounded-xl text-xs font-medium text-center ring-1 ring-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y H:i') }}
                                    </span>

                                </div>

                                <div class="border-t border-slate-100 my-5"></div>

                                <div class="grid md:grid-cols-3 gap-5">

                                    <div>

                                        <p class="font-semibold text-slate-700 text-sm mb-1.5">

                                            Status

                                        </p>

                                        @if($pengumpulan)

                                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full text-xs font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                                Sudah Dikumpulkan
                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-600 px-2.5 py-1 rounded-full text-xs font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                                Belum Dikumpulkan
                                            </span>

                                        @endif

                                    </div>

                                    <div>

                                        <p class="font-semibold text-slate-700 text-sm mb-1.5">

                                            Nilai

                                        </p>

                                        <p class="text-slate-600 text-sm">

                                            {{ $pengumpulan->nilai ?? '-' }}

                                        </p>

                                    </div>

                                    <div>

                                        <p class="font-semibold text-slate-700 text-sm mb-1.5">

                                            Feedback

                                        </p>

                                        <p class="text-slate-600 text-sm">

                                            {{ $pengumpulan->feedback ?? '-' }}

                                        </p>

                                    </div>

                                </div>

                            </div>

                            <div class="border-t border-slate-100 bg-slate-50/60 px-6 py-4">

                                @if(!$pengumpulan)

                                    <a href="/pengumpulan/{{ $item->id }}"
                                       class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition-colors duration-150 text-white px-5 py-2.5 rounded-xl text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                                        </svg>
                                        Kumpulkan Tugas
                                    </a>

                                @else

                                    <button
                                        disabled
                                        class="inline-flex items-center gap-1.5 bg-emerald-100 text-emerald-700 px-5 py-2.5 rounded-xl text-sm font-medium cursor-not-allowed">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Sudah Dikumpulkan
                                    </button>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</x-app-layout>