<h1>Edit Jurusan</h1>

<form action="{{ route('jurusan.update', $data->id_jurusan) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nama_jurusan" value="{{ $data->nama_jurusan }}">
    <input type="text" name="akreditasi" value="{{ $data->akreditasi }}">
    <button type="submit">Update</button>
</form>