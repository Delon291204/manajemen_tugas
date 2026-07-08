<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📚 Mata Kuliah Saya
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($mataKuliah->count() == 0)

                <div class="bg-white rounded-xl shadow p-10 text-center">

                    <h3 class="text-2xl font-semibold text-gray-700">
                        Belum Ada Mata Kuliah
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Belum ada mata kuliah yang tersedia.
                    </p>

                </div>

            @else

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @foreach($mataKuliah as $mk)

                        <div class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300">

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

                            <div class="border-t bg-gray-50 px-6 py-4">

                                <a href="/mata-kuliah-mahasiswa/{{ $mk->id }}"
                                   class="w-full inline-block text-center bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg">

                                    Lihat Tugas

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</x-app-layout>