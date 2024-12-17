<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "nama_pegawai"=> "required|string",
            "no_hp"=> "required|string",
            "email"=> "required|email|unique:pegawais,email",
            "jabatan"=> "required|string|in:Pimpinan,Pegawai",
            "kantor_id"=> "required|exists:kantors,kantor_id",
            "pimpinan_id"=> "required|exists:pegawais,pegawai_id",
        ];
    }

    public function messages(): array
    {
        return [
            "nama_pegawai.required"=> "Nama pegawai harus diisi",
            "nama_pegawai.string"=> "Nama pegawai harus berupa text",
            "email.required"=> "Email harus diisi",
            "email.email"=> "Email harus berupa format email",
            "email.unique"=> "Email sudah terdaftar",
            "jabatan.required"=> "Jabatan harus diisi",
            "jabatan.in"=> "Jabatan harus berupa Pimpinan atau Pegawai",
            "kantor_id.required"=> "Kantor harus diisi",
            "kantor_id.exists"=> "Kantor tidak ditemukan",
            "pimpinan_id.required"=> "Pimpinan harus diisi",
            "pimpinan_id.exists"=> "Pimpinan tidak ditemukan",
        ];
    }
}
