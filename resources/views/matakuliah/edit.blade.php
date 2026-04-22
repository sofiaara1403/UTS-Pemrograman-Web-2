<h1>Edit Matakuliah</h1>

<form action="{{ route('matakuliah.update', $data->id_matakuliah) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_matakuliah" value="{{ $data->nama_matakuliah }}">
    <input type="number" name="sks" value="{{ $data->sks }}">

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