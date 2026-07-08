<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🎓 Dashboard Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Welcome Card --}}
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 rounded-xl shadow-lg p-8 text-white mb-8">

                <h2 class="text-3xl font-bold">

                    Selamat Datang, {{ auth()->user()->name }} 👋

                </h2>

                <p class="mt-2 text-indigo-100">

                    Selamat belajar. Jangan lupa menyelesaikan seluruh tugas sebelum deadline.

                </p>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow p-6">

                    <div class="text-4xl">
                        📚
                    </div>

                    <p class="text-gray-500 mt-3">
                        Mata Kuliah
                    </p>

                    <h2 class="text-4xl font-bold text-indigo-600 mt-2">

                        {{ $totalMataKuliah }}

                    </h2>

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <div class="text-4xl">
                        📝
                    </div>

                    <p class="text-gray-500 mt-3">
                        Total Tugas
                    </p>

                    <h2 class="text-4xl font-bold text-blue-600 mt-2">

                        {{ $totalTugas }}

                    </h2>

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <div class="text-4xl">
                        ✅
                    </div>

                    <p class="text-gray-500 mt-3">
                        Sudah Dikumpulkan
                    </p>

                    <h2 class="text-4xl font-bold text-green-600 mt-2">

                        {{ $sudahDikumpulkan }}

                    </h2>

                </div>

                <div class="bg-white rounded-xl shadow p-6">

                    <div class="text-4xl">
                        ⏳
                    </div>

                    <p class="text-gray-500 mt-3">
                        Belum Dikumpulkan
                    </p>

                    <h2 class="text-4xl font-bold text-red-600 mt-2">

                        {{ $belumDikumpulkan }}

                    </h2>

                </div>

            </div>

            {{-- Konten --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

                {{-- Ringkasan Nilai --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-xl font-semibold mb-5">

                        📊 Ringkasan Nilai

                    </h3>

                    <p class="text-gray-500">

                        Rata-rata Nilai

                    </p>

                    <h2 class="text-6xl font-bold text-green-600 mt-3">

                        {{ number_format($rataRataNilai ?? 0, 2) }}

                    </h2>

                    <p class="text-sm text-gray-400 mt-4">

                        Nilai dihitung dari seluruh tugas yang telah dinilai dosen.

                    </p>

                </div>

                {{-- Deadline --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <h3 class="text-xl font-semibold mb-5">

                        ⏰ Deadline Terdekat

                    </h3>

                    @forelse($deadlineTerdekat as $tugas)

                        <div class="border-b py-4">

                            <div class="flex justify-between items-center">

                                <div>

                                    <p class="font-semibold">

                                        {{ $tugas->judul_tugas }}

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        {{ $tugas->mataKuliah->nama_mk }}

                                    </p>

                                </div>

                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">

                                    {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M') }}

                                </span>

                            </div>

                            <p class="text-sm text-gray-500 mt-2">

                                Deadline :

                                {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y H:i') }}

                            </p>

                        </div>

                    @empty

                        <div class="text-center py-8 text-gray-500">

                            Tidak ada deadline.

                        </div>

                    @endforelse

                </div>

            </div>

            {{-- Menu Cepat --}}
            <div class="bg-white rounded-xl shadow p-6 mt-8">

                <h3 class="text-xl font-semibold mb-5">

                    🚀 Menu Cepat

                </h3>

                <div class="flex flex-wrap gap-4">

                    <a href="/mata-kuliah-mahasiswa"
                       class="bg-indigo-600 hover:bg-indigo-700 transition text-white px-6 py-3 rounded-lg">

                        📚 Mata Kuliah Saya

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>