<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📝 Tambah Tugas
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())

                <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">

                    <strong>Terjadi kesalahan:</strong>

                    <ul class="list-disc ml-5 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <div class="bg-white shadow-lg rounded-xl">

                <div class="p-8">

                    <div class="mb-8">

                        <h3 class="text-lg font-semibold text-gray-800">

                            Mata Kuliah

                        </h3>

                        <p class="text-gray-600 mt-2">

                            {{ $mataKuliah->kode_mk }}
                            -
                            {{ $mataKuliah->nama_mk }}

                        </p>

                    </div>

                    <form action="/mata-kuliah/{{ $mataKuliah->id }}/tugas"
                          method="POST">

                        @csrf

                        <div class="mb-6">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">

                                Judul Tugas

                            </label>

                            <input
                                type="text"
                                name="judul_tugas"
                                value="{{ old('judul_tugas') }}"
                                required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        </div>

                        <div class="mb-6">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">

                                Deskripsi

                            </label>

                            <textarea
                                name="deskripsi"
                                rows="5"
                                required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('deskripsi') }}</textarea>

                        </div>

                        <div class="mb-8">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">

                                Deadline

                            </label>

                            <input
                                type="datetime-local"
                                name="deadline"
                                value="{{ old('deadline') }}"
                                required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        </div>

                        <div class="flex justify-end gap-3">

                            <a href="/mata-kuliah/{{ $mataKuliah->id }}/tugas"
                               class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">

                                Simpan Tugas

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>