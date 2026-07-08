<h1>Tambah Tugas</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/tugas" method="POST">
    @csrf

    <label>Mata Kuliah</label><br>

    <select name="id_mk" required>
        <option value="">-- Pilih Mata Kuliah --</option>

        @foreach($mataKuliah as $mk)
            <option value="{{ $mk->id }}">
                {{ $mk->kode_mk }} - {{ $mk->nama_mk }}
            </option>
        @endforeach

    </select>

    <br><br>

    <label>Judul Tugas</label><br>
    <input type="text"
           name="judul_tugas"
           value="{{ old('judul_tugas') }}"
           required>

    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required>{{ old('deskripsi') }}</textarea>

    <br><br>

    <label>Deadline</label><br>
    <input type="datetime-local"
           name="deadline"
           value="{{ old('deadline') }}"
           required>

    <br><br>

    <button type="submit">
        Simpan
    </button>

    <a href="/tugas">
        Kembali
    </a>

</form>