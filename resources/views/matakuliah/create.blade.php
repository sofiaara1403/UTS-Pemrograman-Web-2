<h1>Tambah Matakuliah</h1>

<form action="{{ route('matakuliah.store') }}" method="POST">
    @csrf
    <input type="text" name="nama_matakuliah" placeholder="Nama Matakuliah">
    <input type="number" name="sks" placeholder="SKS">

    <select name="id_jurusan">
        @foreach($jurusan as $j)
            <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>