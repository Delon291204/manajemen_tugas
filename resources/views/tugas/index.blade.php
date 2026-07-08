<h1>Daftar Tugas</h1>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

<a href="/tugas/create">
    Tambah Tugas
</a>

<hr>

@if($tugas->count() == 0)

    <p>Belum ada tugas.</p>

@else

    @foreach($tugas as $item)

        <h3>{{ $item->judul_tugas }}</h3>

        <p>
            <strong>Mata Kuliah :</strong>
            {{ $item->mataKuliah->kode_mk }}
            -
            {{ $item->mataKuliah->nama_mk }}
        </p>

        <p>
            {{ $item->deskripsi }}
        </p>

        <p>
            <strong>Deadline :</strong>
            {{ $item->deadline }}
        </p>

        <p>
            <strong>Status :</strong>

            @if($item->status == 'aktif')

                <span style="color:green">
                    Aktif
                </span>

            @else

                <span style="color:red">
                    Tidak Aktif
                </span>

            @endif

        </p>

        <a href="/tugas/{{ $item->id }}/edit">
            Edit
        </a>

        |

        <a href="/pengumpulan-dosen/{{ $item->id }}">
            Lihat Pengumpulan
        </a>

        |

        <form action="/tugas/{{ $item->id }}"
              method="POST"
              style="display:inline;">

            @csrf
            @method('DELETE')

            <button type="submit"
                    onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                Hapus
            </button>

        </form>

        <hr>

    @endforeach

@endif