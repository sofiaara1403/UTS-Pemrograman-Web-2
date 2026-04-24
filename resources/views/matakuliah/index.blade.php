<x-app-layout>
<x-slot name="header">
    <h2 class="fw-bold text-warning">📚 Data Matakuliah</h2>
</x-slot>

<div class="container mt-4">

<!-- 🔍 SEARCH + FILTER -->
<div class="card mb-3 shadow glass">
<div class="card-body">

<form method="GET" action="{{ route('matakuliah.index') }}" class="row g-2">

<div class="col-md-4">
<input type="text" name="search" class="form-control"
placeholder="Cari matakuliah..."
value="{{ request('search') }}">
</div>

<div class="col-md-4">
<select name="id_jurusan" class="form-select">
<option value="">-- Semua Jurusan --</option>
@foreach($jurusan as $j)
<option value="{{ $j->id_jurusan }}"
{{ request('id_jurusan') == $j->id_jurusan ? 'selected' : '' }}>
{{ $j->nama_jurusan }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4 d-flex gap-2">
<button class="btn btn-primary">Filter</button>
<a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Reset</a>
</div>

</form>

</div>
</div>

<a href="{{ route('matakuliah.create') }}" class="btn btn-warning mb-3 btn-soft">
+ Tambah Matakuliah
</a>

<div class="card shadow glass">
<div class="card-body">

<table class="table table-hover align-middle">
<thead class="table-dark">
<tr>
<th>Nama</th>
<th>SKS</th>
<th>Jurusan</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
@foreach($matakuliah as $m)
<tr>
<td>{{ $m->nama_matakuliah }}</td>
<td>{{ $m->sks }}</td>
<td>{{ $m->jurusan->nama_jurusan }}</td>
<td>
<a href="{{ route('matakuliah.edit', $m->id_matakuliah) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('matakuliah.destroy', $m->id_matakuliah) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button class="btn btn-danger btn-sm">Hapus</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>

<div class="mt-3">
{{ $matakuliah->links() }}
</div>

</div>
</div>

</div>
</x-app-layout>