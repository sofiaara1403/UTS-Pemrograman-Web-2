<h1>Tambah Jurusan</h1>

<form action="{{ route('jurusan.store') }}" method="POST">
    @csrf
    <input type="text" name="nama_jurusan" placeholder="Nama Jurusan">
    <input type="text" name="akreditasi" placeholder="Akreditasi">
    <button type="submit">Simpan</button>
</form>