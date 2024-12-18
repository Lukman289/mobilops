@extends('admin.layout.template')

@section('content')
<div class="container mt-1 mb-4">
    <h2 class="mb-4">Jadwal Service Kendaraan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{route('service.create')}}" class="btn btn-primary">Tambah Jadwal Service Kendaraan</a>
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
                        <th>Nomor Polisi Kendaraan</th>
                        <th>Tanggal Service</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwalServices as $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->getKendaraan->nomor_polisi }}</td>
                            <td>{{ $jadwal->tanggal_service }}</td>
                            <td>
                                <a href="service/detail/{{$jadwal->id}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="service/edit/{{$jadwal->id}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="service/{{$jadwal->id}}" method="POST" style="display:inline;">
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