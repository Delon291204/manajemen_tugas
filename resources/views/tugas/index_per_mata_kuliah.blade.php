<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <div>

                <h2 class="font-semibold text-2xl text-gray-800">
                    📖 {{ $mataKuliah->nama_mk }}
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    {{ $mataKuliah->kode_mk }} • Semester {{ $mataKuliah->semester }}
                </p>

            </div>

            <a href="/mata-kuliah/{{ $mataKuliah->id }}/tugas/create"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">

                + Tambah Tugas

            </a>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 rounded-lg px-4 py-3">

                    {{ session('success') }}

                </div>

            @endif

            <div class="bg-white rounded-xl shadow">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-3 text-left">
                                    Judul Tugas
                                </th>

                                <th class="px-6 py-3 text-left">
                                    Deadline
                                </th>

                                <th class="px-6 py-3 text-center">
                                    Status
                                </th>

                                <th class="px-6 py-3 text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            @forelse($tugas as $item)

                                <tr>

                                    <td class="px-6 py-4">

                                        <div class="font-semibold">

                                            {{ $item->judul_tugas }}

                                        </div>

                                        <div class="text-gray-500 text-sm">

                                            {{ $item->deskripsi }}

                                        </div>

                                    </td>

                                    <td class="px-6 py-4">

                                        {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y H:i') }}

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if($item->status == 'aktif')

                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                                Aktif

                                            </span>

                                        @else

                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                                Nonaktif

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <a href="/pengumpulan-dosen/{{ $item->id }}"
                                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded">

                                                Pengumpulan

                                            </a>

                                            <a href="/tugas/{{ $item->id }}/edit"
                                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                                Edit

                                            </a>

                                            <form action="/tugas/{{ $item->id }}"
                                                  method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    onclick="return confirm('Yakin ingin menghapus tugas ini?')"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">

                                                    Hapus

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center py-10 text-gray-500">

                                        Belum ada tugas pada mata kuliah ini.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-6">

                <a href="/mata-kuliah"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">

                    ← Kembali ke Mata Kuliah

                </a>

            </div>

        </div>

    </div>

</x-app-layout>