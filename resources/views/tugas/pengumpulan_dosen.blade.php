<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
            </svg>
            Pengumpulan Tugas
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 flex items-center gap-3"></div>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <p class="text-sm font-medium">
                        {{ session('success') }}
                    </p>
                </div>

            @endif

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-100">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Nama
                                </th>

<th class="px-6 py-3.5 text-center text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Mahasiswa
                                </th>

                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    File
                                </th>

                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Penilaian
                                </th>

                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Status
                                </th>

                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                    Tanggal
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($pengumpulan as $item)

                                <tr class="hover:bg-slate-50/60 transition-colors duration-150">

                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-slate-800">

                                            {{ $item->mahasiswa->name }}

                                        </div>

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        <td class="px-6 py-4">

    <div class="space-y-3">

        <div>

            <p class="text-xs text-slate-500 mb-1">
                Nama File
            </p>

            <p class="text-sm font-medium text-slate-700 break-all">

                {{ $item->file_tugas }}

            </p>

        </div>

        <div class="flex gap-2">

            <a href="{{ asset('uploads/'.$item->file_tugas) }}"
               target="_blank"
               class="inline-flex items-center gap-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12 18 19.5 12 19.5 2.25 12 2.25 12Z"/>

                    <circle cx="12"
                            cy="12"
                            r="3"/>

                </svg>

                View

            </a>

            <a href="{{ asset('uploads/'.$item->file_tugas) }}"
               download
               class="inline-flex items-center gap-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-600 px-3 py-2 rounded-lg text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 3v12m0 0l4-4m-4 4-4-4M4.5 19.5h15"/>

                </svg>

                Download

            </a>

        </div>

    </div>

</td>

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if($item->nilai)

                                            <span class="font-bold text-emerald-600 text-lg">

                                                {{ $item->nilai }}

                                            </span>

                                        @else

                                            <span class="text-slate-400">

                                                -

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if($item->status == 'dikumpulkan')

    <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium ring-1 ring-emerald-100">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        Sudah Dikumpulkan
    </span>

@elseif($item->status == 'dinilai')

    <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-medium ring-1 ring-blue-100">
        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
        Sudah Dinilai
    </span>

@else

    <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-medium ring-1 ring-red-100">
        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
        Belum
    </span>

@endif

                                    </td>

                                    <td class="px-6 py-4 text-center text-sm text-slate-600">

                                        {{ \Carbon\Carbon::parse($item->tanggal_kumpul)->format('d M Y H:i') }}

                                    </td>

                                    <td class="px-6 py-4">

                                        <form action="/pengumpulan/{{ $item->id }}/nilai"
                                              method="POST">

                                            @csrf

                                                @if($item->status == 'dinilai')

    <div class="rounded-lg bg-blue-50 border border-blue-200 px-3 py-2">

        <p class="text-xs font-semibold text-blue-700">

            ✓ Sudah Dinilai

        </p>

        <p class="text-xs text-blue-600 mt-1">

            Nilai dan feedback masih dapat diperbarui jika diperlukan.

        </p>

    </div>

@else

    <div class="rounded-lg bg-amber-50 border border-amber-200 px-3 py-2">

        <p class="text-xs font-semibold text-amber-700">

            Belum Dinilai

        </p>

        <p class="text-xs text-amber-600 mt-1">

            Masukkan nilai dan feedback untuk mahasiswa.

        </p>

    </div>

@endif

                                            <div class="space-y-3 min-w-[200px]">

                                                <input
                                                    type="number"
                                                    name="nilai"
                                                    min="0"
                                                    max="100"
                                                    value="{{ $item->nilai }}"
                                                    placeholder="Nilai"
                                                    class="w-full rounded-xl border-slate-200 text-slate-700 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-shadow duration-150">

                                                <textarea
                                                    name="feedback"
                                                    rows="3"
                                                    placeholder="Feedback..."
                                                    class="w-full rounded-xl border-slate-200 text-slate-700 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-shadow duration-150">{{ $item->feedback }}</textarea>

                                                <button
    type="submit"
    class="w-full inline-flex items-center justify-center gap-1.5
    {{ $item->status == 'dinilai'
        ? 'bg-amber-500 hover:bg-amber-600 active:bg-amber-700 shadow-amber-200'
        : 'bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 shadow-indigo-200'
    }}
    transition-colors duration-150 text-white rounded-xl py-2 text-sm font-medium">

    @if($item->status == 'dinilai')

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-4 h-4"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
             stroke-width="2">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.586-9.414a2 2 0 1 1 2.828 2.828L12 14l-4 1 1-4 8.414-8.414Z"/>

        </svg>

        Perbarui Nilai

    @else

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-4 h-4"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
             stroke-width="2">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>

        </svg>

        Simpan Nilai

    @endif

</button>

                                            </div>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="text-center py-12">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-slate-300 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                                        </svg>
                                        <p class="text-slate-400 text-sm">
                                            Belum ada mahasiswa yang mengumpulkan tugas.
                                        </p>
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