<h1>Data Matakuliah</h1>

<a href="{{ route('matakuliah.create') }}">Tambah Matakuliah</a>

@foreach($matakuliah as $m)
    <p>
        {{ $m->nama_matakuliah }} - {{ $m->sks }} SKS - {{ $m->jurusan->nama_jurusan }}

        <a href="{{ route('matakuliah.edit', $m->id_matakuliah) }}">Edit</a>

        <form action="{{ route('matakuliah.destroy', $m->id_matakuliah) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </p>
@endforeach