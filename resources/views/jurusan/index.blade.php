<h1>Data Jurusan</h1>

<a href="{{ route('jurusan.create') }}">Tambah Jurusan</a>

@foreach($jurusan as $j)
    <p>
        {{ $j->nama_jurusan }} - {{ $j->akreditasi }}

        <a href="{{ route('jurusan.edit', $j->id_jurusan) }}">Edit</a>

        <form action="{{ route('jurusan.destroy', $j->id_jurusan) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </p>
@endforeach