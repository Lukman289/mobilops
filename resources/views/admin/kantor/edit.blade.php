@extends('admin.layout.template')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Edit Data Kantor</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('kantor.update', $kantor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_kantor" class="form-label">Nama Kantor</label>
                    <input type="text" class="form-control" id="nama_kantor" name="nama_kantor" value="{{ $kantor->nama_kantor }}" required>
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('kantor') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection