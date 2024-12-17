@extends('admin.layout.template')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Kantor</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{route('kantor.create')}}" class="btn btn-primary">Tambah Kantor Baru</a>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Daftar Kantor</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kantor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kantors as $kantor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kantor->nama_kantor }}</td>
                            <td>
                                <a href="{{ route('kantor.show', $kantor->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('kantor.edit', $kantor->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('kantor.delete', $kantor->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection