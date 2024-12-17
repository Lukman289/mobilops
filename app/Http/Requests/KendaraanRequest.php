<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KendaraanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            "nomor_polisi"=> "required|string",
            "jarak_tempuh"=> "required|numeric",
            "jenis_kendaraan"=> "required|string|in:Angkutan Orang,Angkutan Barang",
            "konsumsi_bbm"=> "required|numeric",
            "status_kepemilikan"=> "required|string|in:Milik Perusahaan,Sewa",
            "lokasi_kendaraan_id"=> "required|exists:kantors,id",
        ];
    }

    public function messages(): array
    {
        return [
            "nomor_polisi.required"=> "Nomor polisi harus diisi",
            "nomor_polisi.string"=> "Nomor polisi harus berupa text",
            "jarak_tempuh.numeric"=> "Jarak tempuh harus berupa angka",
            "jarak_tempuh.required"=> "Jarak tempuh harus diisi",
            "jenis_kendaraan.enum"=> "Jenis kendaraan harus Angkutan Orang atau Angkutan Barang",
            "jenis_kendaraan.required"=> "Jenis kendaraan harus diisi",
            "konsumsi_bbm.numeric"=> "Konsumsi BBM harus berupa angka",
            "konsumsi_bbm.required"=> "Konsumsi BBM harus diisi",
            "status_kepemilikan.enum"=> "Status kepemilikan harus Milik Perusahaan atau Sewa",
            "status_kepemilikan.required"=> "Statu kepemilikan harus diisi",
            "lokasi_kendaraan_id.required"=> "Lokasi kendaraan harus diisi",
            "lokasi_kendaraan_id.exists"=> "Lokasi kendaraan tidak ditemukan",
        ];
    }
}
