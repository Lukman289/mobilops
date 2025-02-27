@extends('admin.layout.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Pegawai</h2>
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pegawai->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $pegawai->email }}" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="Pimpinan" {{ $pegawai->jabatan === 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                <option value="Pegawai" {{ $pegawai->jabatan === 'Pegawai' ? 'selected' : '' }}>Pegawai</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="kantor_id" class="form-label">Lokasi Bekerja</label>
            <select class="form-select" id="kantor_id" name="kantor_id">
                <option value="">Pilih Kantor</option>
                @foreach($kantors as $kantor)
                    <option value="{{ $kantor->id }}" {{ $pegawai->kantor_id == $kantor->id ? 'selected' : '' }}>
                        {{ $kantor->nama_kantor }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pimpinan_id" class="form-label">Nama Pimpinan</label>
            <select class="form-select" id="pimpinan_id" name="pimpinan_id">
                <option value="">Pilih Pimpinan</option>
                @foreach($pemimpins as $pimpinan)
                    <option value="{{ $pimpinan->id }}" {{ $pegawai->pimpinan_id == $pimpinan->id ? 'selected' : '' }}>
                        {{ $pimpinan->nama_pegawai }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pegawai') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection