@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Kendaraan</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor Polisi</th>
                    <td>{{ $kendaraan->nomor_polisi }}</td>
                </tr>
                <tr>
                    <th>Jarak Tempuh</th>
                    <td>{{ number_format($kendaraan->jarak_tempuh, 2) }} km</td>
                </tr>
                <tr>
                    <th>Jenis Kendaraan</th>
                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                </tr>
                <tr>
                    <th>Konsumsi BBM</th>
                    <td>{{ number_format($kendaraan->konsumsi_bbm, 2) }} liter/km</td>
                </tr>
                <tr>
                    <th>Status Kepemilikan</th>
                    <td>{{ $kendaraan->status_kepemilikan }}</td>
                </tr>
                <tr>
                    <th>Lokasi Kendaraan</th>
                    <td>{{ $kendaraan->lokasiKendaraan ? $kendaraan->lokasiKendaraan->nama_kantor : 'Belum Ditentukan' }}</td>
                </tr>
            </table>

            <a href="{{ route('kendaraan') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('kendaraan.edit', $kendaraan->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
