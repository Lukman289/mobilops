@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Detail Pengguna</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Detail Pengguna: {{ $user->getPegawai->nama_pegawai }}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4"><strong>Username:</strong></div>
                <div class="col-md-8">{{ $user->username }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Role:</strong></div>
                <div class="col-md-8">{{ ucfirst($user->role) }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Pegawai:</strong></div>
                <div class="col-md-8">{{ $user->getPegawai->nama_pegawai ?? 'N/A' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Lokasi Bekerja:</strong></div>
                <div class="col-md-8">
                    {{ $user->getPegawai->lokasiBekerja->nama_kantor ?? 'Belum Ditempatkan' }}
                </div>
            </div>

            <a href="{{ route('user') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
