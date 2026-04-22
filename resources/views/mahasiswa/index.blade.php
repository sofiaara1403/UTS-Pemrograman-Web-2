<h1>Data Mahasiswa</h1>

<a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>

@foreach($mahasiswa as $m)
    <p>
        {{ $m->nim }} - {{ $m->nama }} - {{ $m->jurusan->nama_jurusan }}

        <a href="{{ route('mahasiswa.edit', $m->id_mahasiswa) }}">Edit</a>

        <form action="{{ route('mahasiswa.destroy', $m->id_mahasiswa) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </p>
@endforeach