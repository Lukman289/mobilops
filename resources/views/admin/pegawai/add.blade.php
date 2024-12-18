@extends('admin.layout.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Pegawai</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan nama pegawai" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="" selected>Pilih Jabatan</option>
                <option value="Pimpinan">Pimpinan</option>
                <option value="Pegawai">Pegawai</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="kantor_id" class="form-label">Lokasi Bekerja</label>
            <select class="form-select" id="kantor_id" name="kantor_id">
                <option value="" selected>Pilih Lokasi Bekerja</option>
                @foreach($kantors as $kantor)
                    <option value="{{ $kantor->id }}">{{ $kantor->nama_kantor }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pimpinan_id" class="form-label">Nama Pimpinan</label>
            <select class="form-select" id="pimpinan_id" name="pimpinan_id">
                <option value="" selected>Pilih Nama Pimpinan</option>
                @foreach($pemimpins as $pimpinan)
                    <option value="{{ $pimpinan->id }}">{{ $pimpinan->nama_pegawai }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pegawai') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection