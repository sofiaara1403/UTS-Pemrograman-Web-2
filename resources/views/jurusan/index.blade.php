<x-app-layout>
<x-slot name="header">
     <h2 class="fw-bold text-primary">🎓 Data Jurusan</h2>
</x-slot>

<div class="container mt-4">

    <!-- SEARCH -->
    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari jurusan...">
            <button class="btn btn-dark">Cari</button>
        </div>
    </form>

    <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-soft">+ Tambah Jurusan</a>

    <div class="card shadow glass">
        <div class="card-body">

            <!-- LANGSUNG TABLE -->
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Akreditasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($jurusan as $j)
                    <tr>
                        <td>{{ $j->nama_jurusan }}</td>
                        <td>{{ $j->akreditasi }}</td>
                        <td>
                            <a href="{{ route('jurusan.edit', $j->id_jurusan) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('jurusan.destroy', $j->id_jurusan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $jurusan->links() }}

        </div>
    </div>
</div>
</x-app-layout>