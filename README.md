<p align="center"><img src="public\img\icon.png" width="400"></p>

## User Story

Sebuah perusahaan tambang nikel berlokasi di beberapa daerah (region), satu kantor pusat, satu kantor cabang dan memiliki enam tambang dengan lokasi yang berbeda. Perusahaan tersebut mempunyai banyak kendaraan dengan jenis kendaraan angkutan orang dan angkutan barang. Selain kendaraan milik perusahaan, ada juga kendaraan yang disewa dari perusahaan persewaan. 

Perusahaan tersebut membutuhkan sebuah web aplikasi untuk dapat memonitoring  kendaraan yang dimiliki. Mulai dari konsumsi BBM, jadwal service dan riwayat pemakaian kendaraan. Untuk dapat memakai kendaraan, pegawai diwajibkan untuk melakukan pemesanan terlebih dahulu ke pool atau bagian pengelola kendaraan dan pemakaian kendaraan harus diketahui atau disetujui oleh masing - masing atasan.

## 

<p align="center"> 
<img src="https://th.bing.com/th/id/R.b81c0382fdfc29bc4a6603c1846f0acf?rik=AUACzJrX%2f0VCdA&riu=http%3a%2f%2fpngimg.com%2fuploads%2fphp%2fphp_PNG35.png&ehk=SDq0mYWBBsWE3A6HnxdvAQErErsuHxmn50YjvmaL83Q%3d&risl=&pid=ImgRaw&r=0" width="50">
<img src="https://pngimg.com/uploads/mysql/mysql_PNG22.png" width="50">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="120">
</p>

- PHP 8.1.31
- MySql 8.0.30
- Laravel 10

##
## Daftar Username & Password

<table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
    <thead style="background-color:rgb(36, 36, 36);">
        <tr>
            <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">No</th>
            <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">Username</th>
            <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">Password</th>
            <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">Role</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >1</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >budi</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >admin1234</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >admin</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >2</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >andi</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >andipassword</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >validator</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >3</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >dewi</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >dewipassword</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >validator</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >4</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >eka</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >ekapassword</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >validator</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >5</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >fajar</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >fajarpassword</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >validator</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >6</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >gita</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >gitapassword</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >validator</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >7</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >hadi</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >hadipassword</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >validator</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;" >8</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >indah</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >indahpassword</td>
            <td style="padding: 8px; border: 1px solid #ddd;" >validator</td>
        </tr>
    </tbody>
</table>

##
## Panduan Penggunaan Aplikasi

### Manajemen Operasional/Peminjaman Kendaraan
- Login dengan dengan akun yang memiliki role admin
- Akses menu operasional kendaraan
- Tambah Pengajuan Peminjaman
    - Klik tombol Tambah Pemesanan Baru
    - Isi form yang tersedia
    - Kirim data
    - Menunggu status pengajuan
- Edit Pengajuan Peminjaman 
    - Klik tombol Edit
    - Isi form yang tersedia
    - Kirim data
- Hapus Pengajuan Peminjaman
    - Klik tombol hapus
    - Konfirmasi penghapusan data

#
### Manajemen Pegawai
- Login dengan dengan akun yang memiliki role admin
- Akses menu pegawai
- Tambah Pegawai
    - Klik tombol Tambah Pegawai Baru
    - Isi form sesuai dengan yang diperlukan
    - Kirim data
- Edit Pegawai 
    - Klik tombol Edit
    - Isi form yang tersedia
    - Kirim data
- Hapus Pegawai
    - Klik tombol hapus
    - Konfirmasi penghapusan data

#
### Manajemen Kendaraan
- Login dengan dengan akun yang memiliki role admin
- Akses menu Kendaraan
- Tambah Kendaraan
    - Klik tombol Tambah Kendaraan Baru
    - Isi form sesuai dengan yang diperlukan
    - Kirim data
- Edit Kendaraan 
    - Klik tombol Edit
    - Isi form yang tersedia
    - Kirim data
- Hapus Kendaraan
    - Klik tombol hapus
    - Konfirmasi penghapusan data

#
### Manajemen Jadwal Service Kendaraan
- Login dengan dengan akun yang memiliki role admin
- Akses menu Jadwal Service Kendaraan
- Tambah Jadwal Service Kendaraan
    - Klik tombol Tambah Jadwal Service Kendaraan Baru
    - Isi form sesuai dengan yang diperlukan
    - Kirim data
- Edit Jadwal Service Kendaraan 
    - Klik tombol Edit
    - Isi form yang tersedia
    - Kirim data
- Hapus Jadwal Service Kendaraan
    - Klik tombol hapus
    - Konfirmasi penghapusan data

#
### Manajemen Kantor
- Login dengan dengan akun yang memiliki role admin
- Akses menu Kantor
- Tambah Kantor
    - Klik tombol Tambah Kantor Baru
    - Isi form sesuai dengan yang diperlukan
    - Kirim data
- Edit Kantor 
    - Klik tombol Edit
    - Isi form yang tersedia
    - Kirim data
- Hapus Kantor
    - Klik tombol hapus
    - Konfirmasi penghapusan data

#
### Manajemen User
- Login dengan dengan akun yang memiliki role admin
- Akses menu User
- Tambah User
    - Klik tombol Tambah User Baru
    - Isi form sesuai dengan yang diperlukan
    - Kirim data
- Edit User 
    - Klik tombol Edit
    - Isi form yang tersedia
    - Kirim data
- Hapus User
    - Klik tombol hapus
    - Konfirmasi penghapusan data

#
### Validasi Pengajuam Peminjaman Kendaraan
- Login dengan dengan akun yang memiliki role validator
- Klik tombol hijau/setuju untuk menyetujui pengajuan peminjaman kendaraan
- Klik tombol hijau/setuju untuk menolak pengajuan peminjaman kendaraan

## Physical Data Model
<img src="public\img\pdm_mobilops.png">