<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
            Edit Tugas
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())

                <div class="mb-6 rounded-2xl bg-red-50 border border-red-100 text-red-700 px-5 py-4 flex gap-3">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>

                    <div>
                        <p class="font-semibold text-sm">Terjadi kesalahan:</p>

                        <ul class="list-disc ml-5 mt-1.5 text-sm space-y-0.5">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>
                    </div>

                </div>

            @endif

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">

                <div class="p-8">

                    <div class="mb-8 rounded-xl bg-slate-50 border border-slate-100 px-5 py-4">

                        <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wide">

                            Mata Kuliah

                        </h3>

                        <p class="text-slate-800 font-medium mt-1.5">

                            <span class="inline-flex items-center bg-indigo-50 text-indigo-700 px-2 py-0.5 rounded-full text-xs font-medium mr-1.5 align-middle">
                                {{ $tugas->mataKuliah->kode_mk }}
                            </span>

                            {{ $tugas->mataKuliah->nama_mk }}

                        </p>

                    </div>

                    <form action="/tugas/{{ $tugas->id }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-6">

                            <label
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Judul Tugas

                            </label>

                            <input
    type="text"
    value="{{ $tugas->judul_tugas }}"
    readonly
    class="w-full rounded-xl border-slate-200 bg-slate-100 text-slate-600 cursor-not-allowed">
                        </div>

                        <div class="mb-6">

                            <label
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Deskripsi

                            </label>

                            <textarea
    rows="5"
    readonly
    class="w-full rounded-xl border-slate-200 bg-slate-100 text-slate-600 cursor-not-allowed">{{ $tugas->deskripsi }}</textarea>
                        </div>

<div class="mb-6 rounded-xl bg-amber-50 border border-amber-200 px-4 py-3">

    <p class="text-sm text-amber-700">

        Setelah tugas dipublikasikan, judul dan deskripsi tidak dapat diubah.
        Dosen hanya dapat mengubah deadline tugas.

    </p>

</div>

                        <div class="mb-8">

                            <label
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Deadline

                            </label>

                            <input
                                type="datetime-local"
                                name="deadline"
                                value="{{ old('deadline', \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i')) }}"
                                required
                                class="w-full rounded-xl border-slate-200 text-slate-700 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-shadow duration-150">

                        </div>

                        <div class="flex justify-end gap-3">

                            <a href="/mata-kuliah/{{ $tugas->id_mk }}/tugas"
                               class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 transition-colors duration-150 rounded-xl text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                                Kembali
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 transition-colors duration-150 text-white rounded-xl text-sm font-medium shadow-sm shadow-amber-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Update Tugas
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>