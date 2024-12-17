@extends('admin.layout.template')

@section('content')
<div class="container mt-1 mb-4">
    <h2 class="mb-4">Pemesanan Kendaraan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{route('kendaraan.create')}}" class="btn btn-primary">Tambah Kendaraan Baru</a>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Daftar Kendaraan</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Polisi</th>
                        <th>Jenis Kendaraan</th>
                        <th>Konsumsi BBM</th>
                        <th>Status Kepemilikan</th>
                        <th>Lokasi Kendaraan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kendaraans as $kendaraan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kendaraan->nomor_polisi }}</td>
                            <td>{{ $kendaraan->jenis_kendaraan }}</td>
                            <td>{{ $kendaraan->konsumsi_bbm }}</td>
                            <td>{{ $kendaraan->status_kepemilikan }}</td>
                            <td>{{ $kendaraan->lokasiKendaraan->nama_kantor }}</td>
                            <td>
                                <a href="kendaraan/detail/{{$kendaraan->id}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="kendaraan/edit/{{$kendaraan->id}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="kendaraan/{{$kendaraan->id}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection