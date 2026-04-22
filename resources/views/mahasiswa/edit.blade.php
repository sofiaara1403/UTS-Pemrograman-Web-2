<h1>Edit Mahasiswa</h1>

<form action="{{ route('mahasiswa.update', $data->id_mahasiswa) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nim" value="{{ $data->nim }}">
    <input type="text" name="nama" value="{{ $data->nama }}">

    <select name="id_jurusan">
        @foreach($jurusan as $j)
            <option value="{{ $j->id_jurusan }}" 
                {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                {{ $j->nama_jurusan }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>