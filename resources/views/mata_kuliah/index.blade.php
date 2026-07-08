<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                📚 Daftar Mata Kuliah
            </h2>

            <a href="/mata-kuliah/create"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow transition">
                + Tambah Mata Kuliah
            </a>
        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert Success --}}
            @if(session('success'))

                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>

            @endif

            @if($mataKuliah->count() == 0)

                <div class="bg-white rounded-xl shadow p-10 text-center">

                    <h3 class="text-2xl font-semibold text-gray-700">
                        Belum Ada Mata Kuliah
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Silakan tambahkan mata kuliah terlebih dahulu.
                    </p>

                </div>

            @else

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @foreach($mataKuliah as $mk)

                        <div
                            class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300 border">

                            <div class="p-6">

                                <h3 class="text-xl font-bold text-gray-800">
                                    {{ $mk->nama_mk }}
                                </h3>

                                <div class="mt-4 space-y-2">

                                    <p class="text-gray-600">
                                        <span class="font-semibold">
                                            Kode :
                                        </span>

                                        {{ $mk->kode_mk }}
                                    </p>

                                    <p class="text-gray-600">
                                        <span class="font-semibold">
                                            Semester :
                                        </span>

                                        {{ $mk->semester }}
                                    </p>

                                </div>

                            </div>

                            <div
                                class="border-t bg-gray-50 px-6 py-4 flex flex-wrap gap-2">

                                <a href="/mata-kuliah/{{ $mk->id }}/tugas"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg transition">

                                    Kelola Tugas

                                </a>

                                <a href="/mata-kuliah/{{ $mk->id }}/edit"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg transition">

                                    Edit

                                </a>

                                <form
                                    action="/mata-kuliah/{{ $mk->id }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg transition">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</x-app-layout>