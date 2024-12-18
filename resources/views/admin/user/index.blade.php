@extends('admin.layout.template')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Dashboard - Daftar Pengguna</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <div class="mb-3">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>{{ $user->getPegawai->nama_pegawai ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
