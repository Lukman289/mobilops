<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemesananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "status_pemesanan"=> "required|string|in:Menunggu,Proses,Selesai",
            "tanggal_pemesanan"=> "required|date",
            "tanggal_pemakaian"=> "required|date",
            "kendaraan_id"=> "required|string|exists:kendaraans,kendaraan_id",
            "lokasi_peminjaman_id"=> "required|exists:kantors,kantor_id",
            "driver_id"=> "required|exists:pegawais,pegawai_id",
            "pengesah_id"=> "required|exists:pegawais,pegawai_id",
        ];
    }

    public function messages(): array
    {
        return [
            "status_pemesanan.required"=> "Status pemesanan harus diisi",
            "status_pemesanan.in"=> "Status pemesanan harus berupa Menunggu, Proses, atau Selesai",
            "tanggal_pemesanan.required"=> "Tanggal pemesanan harus diisi",
            "tanggal_pemesanan.date"=> "Tanggal pemesanan harus berupa format tanggal",
            "tanggal_pemakaian.required"=> "Tanggal pemakaian harus diisi",
            "tanggal_pemakaian.date"=> "Tanggal pemakaian harus berupa format tanggal",
            "kendaraan_id.required"=> "Kendaraan harus diisi",
            "kendaraan_id.exists"=> "Kendaraan tidak ditemukan",
            "lokasi_peminjaman_id.required"=> "Lokasi peminjaman harus diisi",
            "lokasi_peminjaman_id.exists"=> "Lokasi peminjaman tidak ditemukan",
            "driver_id.required"=> "Driver harus diisi",
            "driver_id.exists"=> "Driver tidak ditemukan",
            "pengesah_id.required"=> "Pengesah harus diisi",
            "pengesah_id.exists"=> "Pengesah tidak ditemukan",
        ];
    }
}
