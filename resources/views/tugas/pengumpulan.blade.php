<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📤 Kumpulkan Tugas
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())

                <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">

                    <strong>Terjadi kesalahan:</strong>

                    <ul class="list-disc ml-5 mt-2">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @if(session('success'))

                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

                    {{ session('success') }}

                </div>

            @endif

            <div class="bg-white rounded-xl shadow-lg">

                <div class="p-8">

                    <h3 class="text-xl font-bold text-gray-800">

                        {{ $tugas->judul_tugas }}

                    </h3>

                    <p class="text-gray-600 mt-3">

                        {{ $tugas->deskripsi }}

                    </p>

                    <div class="mt-6 space-y-2">

                        <p>

                            <span class="font-semibold">
                                Deadline :
                            </span>

                            {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y H:i') }}

                        </p>

                        <p>

                            <span class="font-semibold">
                                Status :
                            </span>

                            @if(now() > $tugas->deadline)

                                <span class="text-red-600 font-semibold">

                                    Deadline Berakhir

                                </span>

                            @else

                                <span class="text-green-600 font-semibold">

                                    Masih Dibuka

                                </span>

                            @endif

                        </p>

                    </div>

                    <hr class="my-8">

                    @if(now() <= $tugas->deadline)

                        <form action="/pengumpulan/{{ $tugas->id }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="mb-6">

                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2">

                                    Upload File Tugas

                                </label>

                                <input
                                    type="file"
                                    name="file_tugas"
                                    required
                                    class="block w-full text-sm border rounded-lg p-2">

                            </div>

                            <div class="flex justify-end gap-3">

                                <a href="/mata-kuliah-mahasiswa/{{ $tugas->id_mk }}"
                                   class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">

                                    Kembali

                                </a>

                                <button
                                    type="submit"
                                    class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">

                                    📤 Kumpulkan Tugas

                                </button>

                            </div>

                        </form>

                    @else

                        <div class="bg-red-100 border border-red-300 rounded-lg p-4 text-red-700">

                            Deadline pengumpulan telah berakhir.

                        </div>

                        <div class="mt-6">

                            <a href="/mata-kuliah-mahasiswa/{{ $tugas->id_mk }}"
                               class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">

                                Kembali

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>