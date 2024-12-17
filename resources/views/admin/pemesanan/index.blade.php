@extends('admin.layout.template')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Pemesanan Kendaraan</h2>

    <div class="mb-3">
        <a href="/add-order" class="btn btn-primary">Tambah Pemesanan Baru</a>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Daftar Pemesanan Kendaraan</strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pemesan</th>
                        <th>Jenis Kendaraan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>SUV</td>
                        <td>2024-12-15</td>
                        <td>
                            <span class="badge bg-warning">Sedang Diproses</span>
                        </td>
                        <td>
                            <a href="/order-detail/1" class="btn btn-info btn-sm">Detail</a>
                            <a href="/edit-order/1" class="btn btn-success btn-sm">Edit</a>
                            <a href="/cancel-order/1" class="btn btn-danger btn-sm">Batal</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>Minivan</td>
                        <td>2024-12-14</td>
                        <td>
                            <span class="badge bg-success">Selesai</span>
                        </td>
                        <td>
                            <a href="/order-detail/2" class="btn btn-info btn-sm">Detail</a>
                            <a href="/edit-order/2" class="btn btn-success btn-sm">Edit</a>
                            <a href="/cancel-order/2" class="btn btn-danger btn-sm">Batal</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Sam Wilson</td>
                        <td>Truck</td>
                        <td>2024-12-10</td>
                        <td>
                            <span class="badge bg-danger">Dibatalkan</span>
                        </td>
                        <td>
                            <a href="/order-detail/3" class="btn btn-info btn-sm">Detail</a>
                            <a href="/edit-order/3" class="btn btn-success btn-sm">Edit</a>
                            <a href="/cancel-order/3" class="btn btn-danger btn-sm">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection