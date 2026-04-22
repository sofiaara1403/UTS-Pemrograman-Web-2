<h1>Tambah Mahasiswa</h1>

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <input type="text" name="nim" placeholder="NIM">
    <input type="text" name="nama" placeholder="Nama">

    <select name="id_jurusan">
        @foreach($jurusan as $j)
            <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>