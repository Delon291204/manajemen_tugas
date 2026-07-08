<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">

                    📚 {{ $mataKuliah->nama_mk }}

                </h2>

                <p class="text-gray-500 mt-1">

                    {{ $mataKuliah->kode_mk }}
                    •
                    Semester {{ $mataKuliah->semester }}

                </p>

            </div>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($tugas->count()==0)

                <div class="bg-white rounded-xl shadow p-10 text-center">

                    <h3 class="text-xl font-semibold">

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

                        <div class="bg-white rounded-xl shadow">

                            <div class="p-6">

                                <div class="flex justify-between items-start">

                                    <div>

                                        <h3 class="text-xl font-bold">

                                            {{ $item->judul_tugas }}

                                        </h3>

                                        <p class="text-gray-600 mt-2">

                                            {{ $item->deskripsi }}

                                        </p>

                                    </div>

                                    <span class="text-sm text-red-600 font-semibold">

                                        Deadline

                                        <br>

                                        {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y H:i') }}

                                    </span>

                                </div>

                                <hr class="my-5">

                                <div class="grid md:grid-cols-3 gap-5">

                                    <div>

                                        <p class="font-semibold">

                                            Status

                                        </p>

                                        @if($pengumpulan)

                                            <span class="text-green-600">

                                                ✅ Sudah Dikumpulkan

                                            </span>

                                        @else

                                            <span class="text-red-600">

                                                ❌ Belum Dikumpulkan

                                            </span>

                                        @endif

                                    </div>

                                    <div>

                                        <p class="font-semibold">

                                            Nilai

                                        </p>

                                        <p>

                                            {{ $pengumpulan->nilai ?? '-' }}

                                        </p>

                                    </div>

                                    <div>

                                        <p class="font-semibold">

                                            Feedback

                                        </p>

                                        <p>

                                            {{ $pengumpulan->feedback ?? '-' }}

                                        </p>

                                    </div>

                                </div>

                            </div>

                            <div class="border-t bg-gray-50 px-6 py-4">

                                @if(!$pengumpulan)

                                    <a href="/pengumpulan/{{ $item->id }}"
                                       class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">

                                        📤 Kumpulkan Tugas

                                    </a>

                                @else

                                    <button
                                        disabled
                                        class="bg-green-600 text-white px-5 py-2 rounded-lg cursor-not-allowed">

                                        ✅ Sudah Dikumpulkan

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