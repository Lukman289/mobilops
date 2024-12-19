@extends('admin.layout.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Summary Cards -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-header">Total Peminjaman</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $total }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-header">Peminjaman Dalam Proses</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $totalRequest }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-header">Total Kendaraan</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $totalKendaraan }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Graph -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Grafik Pemakaian Kendaraan</div>
                <div class="card-body">
                    <div id="chart-container" style="height: 300px; width: 100%;">
                        <canvas id="pemesananChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">Quick Stats</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle me-2"></i> 45% increase in traffic</li>
                        <li><i class="bi bi-check-circle me-2"></i> 25 new orders this month</li>
                        <li><i class="bi bi-check-circle me-2"></i> 13% growth in revenue</li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Recent Activity Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pemesanan Kendaraan Operasional</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal Pemesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanans as $pemesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pemesanan->getDriver->nama_pegawai }}</td>
                                    <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('pemesananChart').getContext('2d');
        const pemesananChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!}, // Nama bulan atau kategori pemesanan
                datasets: [{
                    label: 'Jumlah Pemesanan',
                    data: {!! json_encode($data) !!}, // Data pemesanan
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
