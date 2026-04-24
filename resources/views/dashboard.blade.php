<x-app-layout>
<x-slot name="header">
    <h2 class="fw-bold text-primary">✨ Dashboard</h2>
</x-slot>

<div class="container mt-4">

    <h4 class="mb-4">Halo, {{ Auth::user()->name }} 👋</h4>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card card-aesthetic text-center p-4">
                <div class="icon-big">🎓</div>
                <h5 class="mt-2">Jurusan</h5>
                <h3>{{ \App\Models\Jurusan::count() }}</h3>
                <a href="{{ route('jurusan.index') }}" class="btn btn-primary btn-soft mt-2">Lihat</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-aesthetic text-center p-4">
                <div class="icon-big">👩‍🎓</div>
                <h5 class="mt-2">Mahasiswa</h5>
                <h3>{{ \App\Models\Mahasiswa::count() }}</h3>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-success btn-soft mt-2">Lihat</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-aesthetic text-center p-4">
                <div class="icon-big">📚</div>
                <h5 class="mt-2">Matakuliah</h5>
                <h3>{{ \App\Models\Matakuliah::count() }}</h3>
                <a href="{{ route('matakuliah.index') }}" class="btn btn-warning btn-soft mt-2">Lihat</a>
            </div>
        </div>

    </div>

    <!-- 📊 CHART -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card card-aesthetic p-4">
                <h5>📊 Statistik Mahasiswa per Jurusan</h5>
                <canvas id="chartMahasiswa"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center text-muted">
        ✨ Sistem Akademik Modern ✨
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartMahasiswa');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(\App\Models\Jurusan::pluck('nama_jurusan')) !!},
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: {!! json_encode(
                    \App\Models\Jurusan::withCount('mahasiswa')->pluck('mahasiswa_count')
                ) !!},
                borderWidth: 1
            }]
        }
    });
</script>

</x-app-layout>