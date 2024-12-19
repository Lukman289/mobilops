<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobil Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex vh-100" id="wrapper">
        <div id="d-flex flex-column" id="content-wrapper" style="width: 100%;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 8%;">
                <div class="container-fluid">
                    <button class="btn btn-light" id="sidebarToggle" disabled></button>
                    <p class="navbar-brand mb-0 h1">MOBIL OPERAITONS</p>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Admin</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="main-content" class="pt-4 px-1 flex-grow-1">
                <div class="container mt-4">
                    <h2 class="mb-4">Pemesanan Kendaraan</h2>
                    
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                
                    <div class="card">
                        <div class="card-header">
                            <strong>Daftar Pemesanan Kendaraan</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 0%;">No</th>
                                        <th style="width: 10%;">Nama Driver/Pemesan</th>
                                        <th style="width: 10%;">Tanggal Pemesanan</th>
                                        <th style="width: 10%;">Tanggal Pemakaian</th>
                                        <th style="width: 10%;">Nomor Polisi Kendaraan</th>
                                        <th style="width: 10%;">Lokasi Peminjaman</th>
                                        <th style="width: 10%;">Nama Pengesah</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pemesanans as $pemesanan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pemesanan->getDriver->nama_pegawai }}</td>
                                            <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                                            <td>{{ $pemesanan->tanggal_pemakaian }}</td>
                                            <td>{{ $pemesanan->getKendaraan->nomor_polisi }}</td>
                                            <td>{{ $pemesanan->getLokasi->nama_kantor }}</td>
                                            <td>{{ $pemesanan->pengesah_id ? $pemesanan->getPengesah->nama_pegawai : 'Pimpinan'}}</td>
                                            <td>
                                                @if ($pemesanan->status_pengajuan === 'Menunggu')
                                                    <span class="badge bg-warning">Menunggu</span>
                                                @elseif ($pemesanan->status_pengajuan === 'Disetujui')
                                                    <span class="badge bg-success">Disetujui</span>
                                                @elseif ($pemesanan->status_pengajuan === 'Ditolak')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            @if ($pemesanan->status_pengajuan === 'Menunggu')
                                                <td>
                                                    <form action="{{ route('validator.approve', $pemesanan->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success btn-sm" name="status_pengajuan" value="Disetujui"><i class="bi bi-check-lg"></i></button>
                                                        <button type="submit" class="btn btn-danger btn-sm" name="status_pengajuan" value="Ditolak"><i class="bi bi-x-lg"></i></button>
                                                    </form>
                                                </td>
                                            @else
                                                <td>Pemesanan Sudah {{ $pemesanan->status_pengajuan }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
