@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Tambah Jadwal Service</h2>

    <!-- Menampilkan pesan error atau success -->
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('service.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tanggal_service" class="form-label">Tanggal Service</label>
            <input type="datetime-local" class="form-control" id="tanggal_service" name="tanggal_service" value="{{ old('tanggal_service') }}" required>
            @error('tanggal_service')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kendaraan_id" class="form-label">Kendaraan</label>
            <select class="form-select" id="kendaraan_id" name="kendaraan_id" required>
                <option value="">Pilih Kendaraan</option>
                @foreach($kendaraans as $kendaraan)
                    <option value="{{ $kendaraan->id }}" {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                        {{ $kendaraan->nomor_polisi }}
                    </option>
                @endforeach
            </select>
            @error('kendaraan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('service') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
