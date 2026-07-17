<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <div>

                <h2 class="font-semibold text-2xl text-slate-800 tracking-tight flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    {{ $mataKuliah->nama_mk }}
                </h2>

                <div class="mt-2 flex flex-wrap gap-2">

                    <span class="inline-flex items-center bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full text-xs font-medium">
                        {{ $mataKuliah->kode_mk }}
                    </span>

                    <span class="inline-flex items-center bg-slate-100 text-slate-600 px-2.5 py-1 rounded-full text-xs font-medium">
                        Semester {{ $mataKuliah->semester }}
                    </span>

                </div>

            </div>

            <a href="/mata-kuliah/{{ $mataKuliah->id }}/tugas/create"
               class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white px-4 py-2.5 rounded-xl text-sm font-medium shadow-sm shadow-indigo-200 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Tugas
            </a>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))

    <div class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 flex items-center gap-3">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 shrink-0"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.5">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>

        </svg>

        <p class="text-sm font-medium">
            {{ session('success') }}
        </p>

    </div>

@endif

@if(session('error'))

    <div class="mb-6 rounded-2xl bg-red-50 border border-red-200 text-red-700 px-5 py-4 flex items-center gap-3">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 shrink-0"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.5">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 9v3.75m0 3.75h.008v.008H12V16.5Zm9-4.5a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>

        </svg>

        <p class="text-sm font-medium">
            {{ session('error') }}
        </p>

    </div>

@endif

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-100">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Judul Tugas
                                </th>

                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Deadline
                                </th>

                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Status
                                </th>

                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($tugas as $item)

                                <tr class="hover:bg-slate-50/60 transition-colors duration-150">

                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-slate-800">

                                            {{ $item->judul_tugas }}

                                        </div>

                                        <div class="text-slate-500 text-sm mt-0.5">

                                            {{ $item->deskripsi }}

                                        </div>

                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600">

                                        {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y H:i') }}

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if($item->status == 'aktif')

                                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium ring-1 ring-emerald-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Aktif
                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-medium ring-1 ring-red-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                Nonaktif
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <a href="/pengumpulan-dosen/{{ $item->id }}"
                                               class="inline-flex items-center gap-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                                                </svg>
                                                Pengumpulan
                                            </a>

                                            <a href="/tugas/{{ $item->id }}/edit"
                                               class="inline-flex items-center gap-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                Edit
                                            </a>

                                            @if($item->pengumpulan()->count() == 0)

    <form action="/tugas/{{ $item->id }}"
          method="POST">

        @csrf
        @method('DELETE')

        <button
            onclick="return confirm('Yakin ingin menghapus tugas ini?')"
            class="inline-flex items-center gap-1.5 bg-red-50 hover:bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-150">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />

            </svg>

            Hapus

        </button>

    </form>

@else

    <button
        disabled
        title="Tugas tidak dapat dihapus karena sudah ada mahasiswa yang mengumpulkan."
        class="inline-flex items-center gap-1.5 bg-gray-100 text-gray-400 px-3 py-2 rounded-lg text-sm font-medium cursor-not-allowed">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-4 h-4"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
             stroke-width="2">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M16.5 10.5V7.875a4.125 4.125 0 1 0-8.25 0V10.5m-.75 0h9.75A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21h-10.5A2.25 2.25 0 0 1 4.5 18.75v-6A2.25 2.25 0 0 1 6.75 10.5Z" />

        </svg>

        Tidak Bisa Dihapus

    </button>

@endif

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center py-12">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-slate-300 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <p class="text-slate-400 text-sm">
                                            Belum ada tugas pada mata kuliah ini.
                                        </p>
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-6">

                <a href="/mata-kuliah"
                   class="inline-flex items-center gap-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Kembali ke Mata Kuliah
                </a>

            </div>

        </div>

    </div>

</x-app-layout>