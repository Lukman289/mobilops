<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        Log::info(" Berhasil mengambil data user", ["total data" => count($user)]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data user",
            "data"=> $user,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $user = User::create($request->validated());

            Log::info("Berhasil menambahkan data user", ["user id"=> $user->user_id]);

            return response()->json([
                "status"=> "success",
                "message"=> "Data user berhasil ditambahkan",
                "data"=> $user
            ], 201);
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data user", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "data user gagal ditambahkan",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        Log::info("Data user ditemukan", ["user id"=> $user->user_id]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data user",
            "data"=> $user,
        ],200);
    }

    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            $user = $user::update($request->validated());

            Log::info("Berhasil mengupdate user", ["user id"=> $user->user_id]);

            return response()->json([
                "status"=> "success",
                "message"=> "user berhasil diupdate",
                "data"=> $user,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate user", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "user gagal diupdate",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Log::info("Berhasil menghapus data user", ["user id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "user berhasil dihapus",
        ], 200);
    }
}
