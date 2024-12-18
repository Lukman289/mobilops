@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Tambah Data User</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Form Tambah User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="">Pilih Role</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="validator" {{ old('role') == 'validator' ? 'selected' : '' }}>Validator</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="pegawai_id" class="form-label">Pegawai</label>
                    <select class="form-select" id="pegawai_id" name="pegawai_id" required>
                        <option value="">Pilih Pegawai</option>
                        @foreach($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}" {{ old('pegawai_id') == $pegawai->id ? 'selected' : '' }}>{{ $pegawai->nama_pegawai }}</option>
                        @endforeach
                    </select>
                    @error('pegawai_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('user') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
