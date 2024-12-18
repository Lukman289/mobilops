@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Tambah Data Pemesanan</h2>
    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal_pemakaian" class="form-label">Tanggal Pemakaian</label>
            <input type="datetime-local" class="form-control" id="tanggal_pemakaian" name="tanggal_pemakaian" required>
            @error('tanggal_pemakaian')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kendaraan_id" class="form-label">Kendaraan</label>
            <select class="form-select" id="kendaraan_id" name="kendaraan_id" required>
                <option value="">Pilih Kendaraan</option>
                @foreach($kendaraans as $kendaraan)
                    <option value="{{ $kendaraan->id }}">{{ $kendaraan->nomor_polisi }}</option>
                @endforeach
            </select>
            @error('kendaraan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lokasi_peminjaman_id" class="form-label">Lokasi Peminjaman</label>
            <select class="form-select" id="lokasi_peminjaman_id" name="lokasi_peminjaman_id" required>
                <option value="">Pilih Lokasi</option>
                @foreach($kantors as $kantor)
                    <option value="{{ $kantor->id }}">{{ $kantor->nama_kantor }}</option>
                @endforeach
            </select>
            @error('lokasi_peminjaman_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="driver_id" class="form-label">Driver</label>
            <select class="form-select" id="driver_id" name="driver_id" required>
                <option value="">Pilih Driver</option>
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama_pegawai }}</option>
                @endforeach
            </select>
            @error('driver_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status_pengajuan" class="form-label">Status Pengajuan</label>
            <div id="status_pengajuan">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="status_menunggu" name="status_pengajuan" value="Menunggu" checked required>
                    <label class="form-check-label" for="status_menunggu">Menunggu</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="status_disetujui" name="status_pengajuan" value="Disetujui">
                    <label class="form-check-label" for="status_disetujui">Disetujui</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="status_ditolak" name="status_pengajuan" value="Ditolak">
                    <label class="form-check-label" for="status_ditolak">Ditolak</label>
                </div>
            </div>
            @error('status_pengajuan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pemesanan') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection