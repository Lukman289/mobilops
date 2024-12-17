<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KantorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "nama_kantor"=> "required|string",
        ];
    }
    public function messages(): array
    {
        return [
            "nama_kantor.required"=> "Nama kantor harus diisi",
            "nama_kantor.string"=> "Nama kantor harus berupa text",
        ];
    }
}
