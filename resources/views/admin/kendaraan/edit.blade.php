@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Data Kendaraan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('kendaraan.update', $kendaraan->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nomor_polisi">Nomor Polisi</label>
                    <input type="text" name="nomor_polisi" id="nomor_polisi" 
                           class="form-control @error('nomor_polisi') is-invalid @enderror" 
                           value="{{ old('nomor_polisi', $kendaraan->nomor_polisi) }}" required>
                    @error('nomor_polisi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jarak_tempuh">Jarak Tempuh (km)</label>
                    <input type="number" step="0.01" name="jarak_tempuh" id="jarak_tempuh" 
                           class="form-control @error('jarak_tempuh') is-invalid @enderror" 
                           value="{{ old('jarak_tempuh', $kendaraan->jarak_tempuh) }}" required>
                    @error('jarak_tempuh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                        <option value="Angkutan Orang" 
                            {{ $kendaraan->jenis_kendaraan == 'Angkutan Orang' ? 'selected' : '' }}>Angkutan Orang</option>
                        <option value="Angkutan Barang" 
                            {{ $kendaraan->jenis_kendaraan == 'Angkutan Barang' ? 'selected' : '' }}>Angkutan Barang</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="konsumsi_bbm">Konsumsi BBM (liter/km)</label>
                    <input type="number" step="0.01" name="konsumsi_bbm" id="konsumsi_bbm" 
                           class="form-control @error('konsumsi_bbm') is-invalid @enderror" 
                           value="{{ old('konsumsi_bbm', $kendaraan->konsumsi_bbm) }}" required>
                    @error('konsumsi_bbm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="status_kepemilikan">Status Kepemilikan</label>
                    <select name="status_kepemilikan" id="status_kepemilikan" class="form-control">
                        <option value="Milik Perusahaan" 
                            {{ $kendaraan->status_kepemilikan == 'Milik Perusahaan' ? 'selected' : '' }}>Milik Perusahaan</option>
                        <option value="Sewa" 
                            {{ $kendaraan->status_kepemilikan == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="lokasi_kendaraan_id">Lokasi Kendaraan</label>
                    <select name="lokasi_kendaraan_id" id="lokasi_kendaraan_id" class="form-control">
                        <option value="">-- Pilih Lokasi --</option>
                        @foreach ($kantors as $kantor)
                            <option value="{{ $kantor->id }}" 
                                {{ $kendaraan->lokasi_kendaraan_id == $kantor->id ? 'selected' : '' }}>
                                {{ $kantor->nama_kantor }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('kendaraan') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
