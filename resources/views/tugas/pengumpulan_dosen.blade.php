<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📥 Pengumpulan Tugas
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))

                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

                    {{ session('success') }}

                </div>

            @endif

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-3 text-left font-semibold">
                                    Mahasiswa
                                </th>

                                <th class="px-6 py-3 text-center font-semibold">
                                    File
                                </th>

                                <th class="px-6 py-3 text-center font-semibold">
                                    Nilai
                                </th>

                                <th class="px-6 py-3 text-center font-semibold">
                                    Status
                                </th>

                                <th class="px-6 py-3 text-center font-semibold">
                                    Tanggal
                                </th>

                                <th class="px-6 py-3 text-center font-semibold">
                                    Penilaian
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            @forelse($pengumpulan as $item)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4">

                                        <div class="font-semibold">

                                            {{ $item->mahasiswa->name }}

                                        </div>

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        <a href="{{ asset('uploads/'.$item->file_tugas) }}"
                                           target="_blank"
                                           class="text-blue-600 hover:underline">

                                            📄 Download

                                        </a>

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if($item->nilai)

                                            <span class="font-bold text-green-600">

                                                {{ $item->nilai }}

                                            </span>

                                        @else

                                            <span class="text-gray-400">

                                                -

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if($item->status == 'dikumpulkan')

                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                                Sudah Dikumpulkan

                                            </span>

                                        @else

                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                                Belum

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        {{ \Carbon\Carbon::parse($item->tanggal_kumpul)->format('d M Y H:i') }}

                                    </td>

                                    <td class="px-6 py-4">

                                        <form action="/pengumpulan/{{ $item->id }}/nilai"
                                              method="POST">

                                            @csrf

                                            <div class="space-y-3">

                                                <input
                                                    type="number"
                                                    name="nilai"
                                                    min="0"
                                                    max="100"
                                                    value="{{ $item->nilai }}"
                                                    placeholder="Nilai"
                                                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                                                <textarea
                                                    name="feedback"
                                                    rows="3"
                                                    placeholder="Feedback..."
                                                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ $item->feedback }}</textarea>

                                                <button
                                                    type="submit"
                                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg py-2">

                                                    💾 Simpan Nilai

                                                </button>

                                            </div>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="text-center py-10 text-gray-500">

                                        Belum ada mahasiswa yang mengumpulkan tugas.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>