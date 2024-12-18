<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "tanggal_service"=> "required|date",
            "kendaraan_id"=> "required|string|exists:kendaraans,id",
        ];
    }

    public function messages(): array
    {
        return [
            "tanggal_service.required"=> "Tanggal service harus diisi",
            "tanggal_service.date"=> "Tanggal service harus berupa tanggal",
            "kendaraan_id.required"=> "Kendaraan harus diisi",
            "kendaraan_id.exists"=> "Kendaraan tidak ditemukan",
        ];
    }
}
