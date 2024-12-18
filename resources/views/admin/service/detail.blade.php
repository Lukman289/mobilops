@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Detail Jadwal Service</h2>

    <div class="card">
        <div class="card-header">
            <h4>Jadwal Service ID: {{ $jadwalService->id }}</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="tanggal_service" class="form-label">Tanggal Service</label>
                <p id="tanggal_service">{{ $jadwalService->tanggal_service }}</p>
            </div>
            <div class="mb-3">
                <label for="kendaraan_id" class="form-label">Kendaraan</label>
                <p id="kendaraan_id">{{ $jadwalService->getKendaraan->nomor_polisi }}</p>
            </div>
            <div class="mb-3">
                <label for="kendaraan_id" class="form-label">Jarak Tempuh</label>
                <p id="kendaraan_id">{{ $jadwalService->getKendaraan->jarak_tempuh }} KM</p>
            </div>
            <div class="mb-3">
                <label for="kendaraan_id" class="form-label">Jenis Kendaraan</label>
                <p id="kendaraan_id">{{ $jadwalService->getKendaraan->jenis_kendaraan }}</p>
            </div>
            <div class="mb-3">
                <label for="kendaraan_id" class="form-label">Status Kepemilikan Kendaraan</label>
                <p id="kendaraan_id">{{ $jadwalService->getKendaraan->status_kepemilikan }}</p>
            </div>
            
            <a href="{{ route('service') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
