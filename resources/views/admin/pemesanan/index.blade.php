@extends('admin.layout.template')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Pemesanan Kendaraan</h2>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah Pemesanan Baru</a>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Daftar Pemesanan Kendaraan</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th style="width: 0%;">No</th>
                        <th style="width: 10%;">Nama Driver/Pemesan</th>
                        <th style="width: 10%;">Tanggal Pemesanan</th>
                        <th style="width: 10%;">Tanggal Pemakaian</th>
                        <th style="width: 10%;">Nomor Polisi Kendaraan</th>
                        <th style="width: 10%;">Lokasi Peminjaman</th>
                        <th style="width: 10%;">Nama Pengesah</th>
                        <th style="width: 5%;">Status</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanans as $pemesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemesanan->getDriver->nama_pegawai }}</td>
                            <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td>{{ $pemesanan->tanggal_pemakaian }}</td>
                            <td>{{ $pemesanan->getKendaraan->nomor_polisi }}</td>
                            <td>{{ $pemesanan->getLokasi->nama_kantor }}</td>
                            {{-- <td>{{ $pemesanan->getPengesah->nama_pegawai }}</td> --}}
                            <td>{{ $pemesanan->pengesah_id ? $pemesanan->getPengesah->nama_pegawai : 'Pimpinan'}}</td>
                            <td>
                                @if ($pemesanan->status_pengajuan === 'Menunggu')
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif ($pemesanan->status_pengajuan === 'Disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif ($pemesanan->status_pengajuan === 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <a href="pemesanan/detail/{{$pemesanan->id}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="pemesanan/edit/{{$pemesanan->id}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="pemesanan/{{$pemesanan->id}}" method="POST" style="display:inline;">
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