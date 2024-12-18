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
            "status_pengajuan"=> "required|string|in:Menunggu,Disetujui,Ditolak",
            "tanggal_pemakaian"=> "required|date",
            "kendaraan_id"=> "required|string|exists:kendaraans,id",
            "lokasi_peminjaman_id"=> "required|exists:kantors,id",
            "driver_id"=> "required|exists:pegawais,id",
        ];
    }

    public function messages(): array
    {
        return [
            "status_pengajuan.required"=> "Status pemesanan harus diisi",
            "status_pengajuan.in"=> "Status pemesanan harus salah satu dari Menunggu, Disetujui, atau Ditolak",
            "tanggal_pemakaian.required"=> "Tanggal pemakaian harus diisi",
            "tanggal_pemakaian.date"=> "Tanggal pemakaian harus berupa format tanggal",
            "kendaraan_id.required"=> "Kendaraan harus diisi",
            "kendaraan_id.exists"=> "Kendaraan tidak ditemukan",
            "lokasi_peminjaman_id.required"=> "Lokasi peminjaman harus diisi",
            "lokasi_peminjaman_id.exists"=> "Lokasi peminjaman tidak ditemukan",
            "driver_id.required"=> "Driver harus diisi",
            "driver_id.exists"=> "Driver tidak ditemukan",
        ];
    }
}
