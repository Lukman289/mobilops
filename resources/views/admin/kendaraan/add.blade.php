@extends('admin.layout.template')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Tambah Data Kendaraan</h2>
        <div class="card">
            <div class="card-header">
                <strong>Form Tambah Kendaraan</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('kendaraan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                        <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="{{ old('nomor_polisi') }}" required>
                        @error('nomor_polisi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jarak_tempuh" class="form-label">Jarak Tempuh (Km)</label>
                        <input type="number" class="form-control" id="jarak_tempuh" name="jarak_tempuh" value="{{ old('jarak_tempuh') }}" required>
                        @error('jarak_tempuh')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                        <select class="form-select" id="jenis_kendaraan" name="jenis_kendaraan" required>
                            <option value="Angkutan Orang" {{ old('jenis_kendaraan') == 'Angkutan Orang' ? 'selected' : '' }}>Angkutan Orang</option>
                            <option value="Angkutan Barang" {{ old('jenis_kendaraan') == 'Angkutan Barang' ? 'selected' : '' }}>Angkutan Barang</option>
                        </select>
                        @error('jenis_kendaraan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="konsumsi_bbm" class="form-label">Konsumsi BBM (L/km)</label>
                        <input type="number" class="form-control" id="konsumsi_bbm" name="konsumsi_bbm" step="0.01" value="{{ old('konsumsi_bbm') }}" required>
                        @error('konsumsi_bbm')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status_kepemilikan" class="form-label">Status Kepemilikan</label>
                        <select class="form-select" id="status_kepemilikan" name="status_kepemilikan" required>
                            <option value="Milik Perusahaan" {{ old('status_kepemilikan') == 'Milik Perusahaan' ? 'selected' : '' }}>Milik Perusahaan</option>
                            <option value="Sewa" {{ old('status_kepemilikan') == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                        </select>
                        @error('status_kepemilikan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi_kendaraan_id" class="form-label">Lokasi Kendaraan</label>
                        <select class="form-select" id="lokasi_kendaraan_id" name="lokasi_kendaraan_id">
                            <option value="">Pilih Lokasi</option>
                            @foreach ($kantors as $kantor)
                                <option value="{{ $kantor->id }}" {{ old('lokasi_kendaraan_id') == $kantor->id ? 'selected' : '' }}>
                                    {{ $kantor->nama_kantor }}
                                </option>
                            @endforeach
                        </select>
                        @error('lokasi_kendaraan_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Kendaraan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
