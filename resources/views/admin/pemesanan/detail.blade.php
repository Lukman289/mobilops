@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Detail Pemesanan</h2>

    <div class="card">
        <div class="card-header text-center d-flex justify-content-between">
            <h3>Pemesanan ID: {{ $pemesanan->id }}</h3>

            <div class="d-flex align-items-center">
                <!-- Bulat warna di sebelah kiri -->
                <span class="status-indicator" style=" width: 20px; height: 20px; border-radius: 50%; display: inline-block; background-color: 
                    @if ($pemesanan->status_pengajuan === 'Menunggu') 
                        #ffc107 
                    @elseif ($pemesanan->status_pengajuan === 'Disetujui') 
                        #28a745 
                    @elseif ($pemesanan->status_pengajuan === 'Ditolak') 
                        #dc3545 
                    @endif;">
                </span>
        
                <!-- Teks status di sebelah kanan -->
                <span class="ms-2">
                    @if ($pemesanan->status_pengajuan === 'Menunggu')
                        Menunggu
                    @elseif ($pemesanan->status_pengajuan === 'Disetujui')
                        Disetujui
                    @elseif ($pemesanan->status_pengajuan === 'Ditolak')
                        Ditolak
                    @endif
                </span>
            </div>
        </div>
        <div class="card-body">
            <p><strong>Status Pengajuan:</strong> {{ $pemesanan->status_pengajuan }}</p>
            <p><strong>Tanggal Pemesanan:</strong> {{ $pemesanan->tanggal_pemesanan }}</p>
            <p><strong>Tanggal Pemakaian:</strong> {{ $pemesanan->tanggal_pemakaian }}</p>

            <div class="mb-3">
                <strong>Kendaraan:</strong>
                <p>{{ $pemesanan->kendaraan_id ? $pemesanan->getKendaraan->nomor_polisi : 'Kendaraan tidak ditemukan' }}</p>
            </div>

            <div class="mb-3">
                <strong>Lokasi Peminjaman:</strong>
                <p>{{ $pemesanan->lokasi_peminjaman_id ? $pemesanan->getLokasi->nama_kantor : 'Lokasi tidak ditemukan' }}</p>
            </div>

            <div class="mb-3">
                <strong>Driver:</strong>
                <p>{{ $pemesanan->driver_id ? $pemesanan->getDriver->nama_pegawai : 'Driver tidak ditemukan' }}</p>
            </div>

            <div class="mb-3">
                <strong>Pengesah:</strong>
                <p>{{ $pemesanan->pengesah_id ? $pemesanan->getPengesah->nama_pegawai : 'Pengesah tidak ditemukan' }}</p>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('pemesanan') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
