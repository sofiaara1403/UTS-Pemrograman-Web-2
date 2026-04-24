<x-app-layout>
<x-slot name="header">
    <h2 class="fw-bold text-success">👩‍🎓 Data Mahasiswa</h2>
</x-slot>

<div class="container mt-4">

<!-- 🔍 SEARCH + FILTER -->
<div class="card mb-3 shadow glass">
<div class="card-body">

<form method="GET" action="{{ route('mahasiswa.index') }}" class="row g-2">

<div class="col-md-4">
<input type="text" name="search" class="form-control"
placeholder="Cari nama mahasiswa..."
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
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Reset</a>
</div>

</form>

</div>
</div>

<a href="{{ route('mahasiswa.create') }}" class="btn btn-success mb-3 btn-soft">
+ Tambah Mahasiswa
</a>

<div class="card shadow glass">
<div class="card-body">

<table class="table table-hover align-middle">
<thead class="table-dark">
<tr>
<th>NIM</th>
<th>Nama</th>
<th>Jurusan</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
@foreach($mahasiswa as $m)
<tr>
<td>{{ $m->nim }}</td>
<td>{{ $m->nama }}</td>
<td>{{ $m->jurusan->nama_jurusan }}</td>
<td>
<a href="{{ route('mahasiswa.edit', $m->id_mahasiswa) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('mahasiswa.destroy', $m->id_mahasiswa) }}" method="POST" style="display:inline;">
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
{{ $mahasiswa->links() }}
</div>

</div>
</div>

</div>
</x-app-layout>