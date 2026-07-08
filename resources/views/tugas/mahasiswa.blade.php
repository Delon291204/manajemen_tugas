<h1>Daftar Tugas Mahasiswa</h1>

@foreach($tugas as $item)

    <h3>{{ $item->judul_tugas }}</h3>

    <p>{{ $item->deskripsi }}</p>

    <p>
        Deadline:
        {{ $item->deadline }}
    </p>

    <p>
        Status Tugas:

        @if(now() > $item->deadline)

            <span style="color:red">
                Deadline Berakhir
            </span>

        @else

            <span style="color:green">
                Masih Dibuka
            </span>

        @endif
    </p>

    @php
        $pengumpulan = $pengumpulanSaya
            ->where('id_tugas', $item->id)
            ->first();
    @endphp

    @if($pengumpulan)

        <p>
            Status Pengumpulan:
            {{ $pengumpulan->status }}
        </p>

        <p>
            Nilai:
            {{ $pengumpulan->nilai ?? 'Belum Dinilai' }}
        </p>

        @if($pengumpulan->feedback)

            <p>
                Feedback Dosen:
            </p>

            <div style="
                border:1px solid #ccc;
                padding:10px;
                background:#f5f5f5;
                margin-bottom:10px;
            ">
                {{ $pengumpulan->feedback }}
            </div>

        @endif

    @endif

    @if(now() <= $item->deadline)

        @if(!$pengumpulan)

            <a href="/pengumpulan/{{ $item->id }}">
                Kumpulkan Tugas
            </a>

        @else

            <span style="color:blue">
                Tugas Sudah Dikumpulkan
            </span>

        @endif

    @else

        <span style="color:red">
            Pengumpulan Ditutup
        </span>

    @endif

    <hr>

@endforeach