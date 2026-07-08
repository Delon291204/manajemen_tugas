<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📊 Dashboard Dosen
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Total Mata Kuliah
                    </p>

                    <h2 class="text-4xl font-bold text-indigo-600 mt-3">

                        {{ $totalMataKuliah }}

                    </h2>

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Total Tugas
                    </p>

                    <h2 class="text-4xl font-bold text-blue-600 mt-3">

                        {{ $totalTugas }}

                    </h2>

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Total Pengumpulan
                    </p>

                    <h2 class="text-4xl font-bold text-green-600 mt-3">

                        {{ $totalPengumpulan }}

                    </h2>

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <p class="text-gray-500">
                        Belum Dinilai
                    </p>

                    <h2 class="text-4xl font-bold text-red-600 mt-3">

                        {{ $belumDinilai }}

                    </h2>

                </div>

            </div>

            {{-- Tugas & Pengumpulan --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-lg font-semibold mb-5">

                        📝 5 Tugas Terbaru

                    </h3>

                    @forelse($tugasTerbaru as $tugas)

                        <div class="border-b py-3">

                            <p class="font-semibold">

                                {{ $tugas->judul_tugas }}

                            </p>

                            <p class="text-sm text-gray-500">

                                {{ $tugas->mataKuliah->nama_mk }}

                            </p>

                            <p class="text-sm text-red-500">

                                Deadline :
                                {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y H:i') }}

                            </p>

                        </div>

                    @empty

                        <p class="text-gray-500">

                            Belum ada tugas.

                        </p>

                    @endforelse

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-lg font-semibold mb-5">

                        📥 5 Pengumpulan Terbaru

                    </h3>

                    @forelse($pengumpulanTerbaru as $item)

                        <div class="border-b py-3">

                            <p class="font-semibold">

                                {{ $item->mahasiswa->name }}

                            </p>

                            <p class="text-sm text-gray-500">

                                {{ $item->tugas->judul_tugas }}

                            </p>

                            <p class="text-sm mt-1">

                                @if($item->nilai)

                                    <span class="text-green-600 font-semibold">

                                        ✅ Nilai : {{ $item->nilai }}

                                    </span>

                                @else

                                    <span class="text-red-600 font-semibold">

                                        ⏳ Belum Dinilai

                                    </span>

                                @endif

                            </p>

                        </div>

                    @empty

                        <p class="text-gray-500">

                            Belum ada pengumpulan.

                        </p>

                    @endforelse

                </div>

            </div>

            {{-- Ringkasan & Menu --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-lg font-semibold mb-4">

                        📈 Ringkasan Penilaian

                    </h3>

                    <div class="space-y-3">

                        <div class="flex justify-between">

                            <span>✅ Sudah Dinilai</span>

                            <strong class="text-green-600">

                                {{ $sudahDinilai }}

                            </strong>

                        </div>

                        <div class="flex justify-between">

                            <span>⏳ Belum Dinilai</span>

                            <strong class="text-red-600">

                                {{ $belumDinilai }}

                            </strong>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-lg font-semibold mb-4">

                        🚀 Menu Cepat

                    </h3>

                    <div class="flex flex-wrap gap-3">

                        <a href="/mata-kuliah"
                           class="bg-indigo-600 hover:bg-indigo-700 transition text-white px-5 py-2 rounded-lg">

                            📚 Mata Kuliah

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>