@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Edit Data User</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="validator" {{ $user->role == 'validator' ? 'selected' : '' }}>Validator</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pegawai_id" class="form-label">Pegawai</label>
            <select class="form-select" id="pegawai_id" name="pegawai_id" required>
                <option value="">Pilih Pegawai</option>
                <option value="{{ $user->pegawai_id }}" selected>{{ $user->getPegawai->nama_pegawai }}</option>
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}" {{ $user->pegawai_id == $pegawai->id ? 'selected' : '' }}>
                        {{ $pegawai->nama_pegawai }}
                    </option>
                @endforeach
            </select>
            @error('pegawai_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('user') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
