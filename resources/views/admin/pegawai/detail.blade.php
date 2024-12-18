@extends('admin.layout.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detail Pegawai</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Field</th>
            <th>Detail</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Nama Pegawai</td>
            <td>{{ $pegawai->nama_pegawai }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>{{ $pegawai->no_hp }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $pegawai->email }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>{{ $pegawai->jabatan }}</td>
        </tr>
        <tr>
            <td>Lokasi Bekerja</td>
            <td>{{ $pegawai->lokasiBekerja ? $pegawai->lokasiBekerja->nama_kantor : '-' }}</td>
        </tr>
        <tr>
            <td>Nama Pimpinan</td>
            <td>{{ $pegawai->pimpinan ? $pegawai->pimpinan->nama_pegawai : '-' }}</td>
        </tr>
        </tbody>
    </table>
    <a href="{{ route('pegawai') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection