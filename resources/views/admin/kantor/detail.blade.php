@extends('admin.layout.template')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Detail Kantor</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $kantor->nama_kantor }}</h4>
            <hr>
            <p><strong>Jumlah Kendaraan:</strong> {{ $jumlahKendaraan }}</p>
            <p><strong>Jumlah Pegawai:</strong> {{ $jumlahPegawai }}</p>
        </div>
    </div>

    <a href="{{ route('kantor') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
