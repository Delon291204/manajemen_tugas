<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 leading-tight tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Mata Kuliah
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

                    <form action="/mata-kuliah"
                          method="POST">

                        @csrf

                        <div class="mb-6">

    <label
        class="block text-sm font-semibold text-slate-700 mb-2">

        Mata Kuliah

    </label>

    <select
        name="master_mata_kuliah"
        required
        class="w-full rounded-xl border-slate-200 text-slate-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-shadow duration-150">

        <option value="">
            -- Pilih Mata Kuliah --
        </option>

        @foreach($masterMataKuliah as $mk)

            <option
                value="{{ $mk->id }}"
                {{ old('master_mata_kuliah') == $mk->id ? 'selected' : '' }}>

                {{ $mk->kode_mk }} - {{ $mk->nama_mk }}

            </option>

        @endforeach

    </select>

</div>

                        <div class="mb-8">

                            <label
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Semester

                            </label>

                            <input
                                type="number"
                                name="semester"
                                min="1"
                                max="14"
                                value="{{ old('semester') }}"
                                required
                                class="w-full rounded-xl border-slate-200 text-slate-700 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-shadow duration-150">

                        </div>

                        <div class="flex justify-end gap-3">

                            <a href="/mata-kuliah"
                               class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 transition-colors duration-150 rounded-xl text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                                Kembali
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition-colors duration-150 text-white rounded-xl text-sm font-medium shadow-sm shadow-indigo-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Simpan Mata Kuliah
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>