@extends('admin.layout.template')

@section('content')
<div class="container mt-1 mb-4">
    <h2 class="mb-4">Daftar Pegawai</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{route('pegawai.create')}}" class="btn btn-primary">Tambah Pegawai Baru</a>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Daftar Pegawai</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lokasi Bekerja</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>email</th>
                        <th>Jabatan</th>
                        <th>Pimpinan Divisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pegawais as $pegawai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pegawai->kantor_id ? $pegawai->lokasiBekerja->nama_kantor : 'Belum Ditempatkan'}}</td>
                            <td>{{ $pegawai->nama_pegawai }}</td>
                            <td>{{ $pegawai->no_hp }}</td>
                            <td>{{ $pegawai->email }}</td>
                            <td>{{ $pegawai->jabatan }}</td>
                            <td>{{ $pegawai->pimpinan ? $pegawai->pimpinan->nama_pegawai : '-' }}</td>
                            <td>
                                <a href="pegawai/detail/{{$pegawai->id}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="pegawai/edit/{{$pegawai->id}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="pegawai/{{$pegawai->id}}" method="POST" style="display:inline;">
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