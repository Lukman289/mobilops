<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "username"=> "required|string|unique:users,username",
            "password"=> "required|string",
            "role"=> "required|string|in:admin,validator",
            "pegawai_id"=> "required|exists:pegawais,id",
        ];
    }

    public function messages(): array
    {
        return [
            "username.required"=> "Username harus diisi",
            "username.string"=> "Username harus berupa text",
            "username.unique"=> "Username sudah terdaftar",
            "password.required"=> "Password harus diisi",
            "password.string"=> "Password harus berupa text",
            "role.required"=> "Role harus diisi",
            "role.in"=> "Role harus berupa Admin atau Pegawai",
            "pegawai_id.required"=> "Pegawai harus diisi",
            "pegawai_id.exists"=> "Pegawai tidak ditemukan",
        ];
    }
}
