<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KendaraanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nomor_polisi"=> "required|string",
            "jarak_tempuh"=> "required|numeric",
            "jenis_kendaraan"=> "required|string|in:Angkutan Orang,Angkutan Barang",
            "konsumsi_bbm"=> "required|numeric",
            "status_kepemilikan"=> "required|string|in:Milik Perusahaan,Sewa",
        ];
    }

    public function messages(): array
    {
        return [
            "nomor_polisi.required"=> "Nomor polisi harus diisi",
            "jarak_tempuh.required"=> "Jarak tempuh harus diisi",
            "jenis_kendaraan.required"=> "Jenis kendaraan harus diisi",
            "konsumsi_bbm.required"=> "Konsumsi BBM harus diisi",
            "status_kepemilikan.required"=> "Statu kepemilikan harus diisi",
            "jarak_tempuh.numeric"=> "Jarak tempuh harus berupa angka",
            "jenis_kendaraan.enum"=> "Jenis kendaraan harus Angkutan Orang atau Angkutan Barang",
            "konsumsi_bbm.numeric"=> "Konsumsi BBM harus berupa angka",
            "status_kepemilikan.enum"=> "Status kepemilikan harus Milik Perusahaan atau Sewa",
        ];
    }
}
