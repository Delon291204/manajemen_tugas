<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            ➕ Tambah Mata Kuliah
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

                    <form action="/mata-kuliah"
                          method="POST">

                        @csrf

                        <div class="mb-6">

                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2">

                                Nama Mata Kuliah

                            </label>

                            <input
                                type="text"
                                name="nama_mk"
                                value="{{ old('nama_mk') }}"
                                required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        </div>

                        <div class="mb-6">

                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2">

                                Kode Mata Kuliah

                            </label>

                            <input
                                type="text"
                                name="kode_mk"
                                value="{{ old('kode_mk') }}"
                                required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        </div>

                        <div class="mb-8">

                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2">

                                Semester

                            </label>

                            <input
                                type="number"
                                name="semester"
                                min="1"
                                max="14"
                                value="{{ old('semester') }}"
                                required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        </div>

                        <div class="flex justify-end gap-3">

                            <a href="/mata-kuliah"
                               class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition">

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow transition">

                                Simpan Mata Kuliah

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>