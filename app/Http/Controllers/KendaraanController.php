<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\KendaraanRequest;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();

        Log::info(" Berhasil mengambil data kendaraan", ["total data" => count($kendaraan)]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data kendaraan",
            "data"=> $kendaraan,
        ]);
    }

    public function store(KendaraanRequest $request)
    {
        try {
            $kendaraan = Kendaraan::create($request->validated());

            Log::info("Berhasil menambahkan kendaraan", ["kendaraan id"=> $kendaraan->kendaraan_id]);

            return response()->json([
                "status"=> "success",
                "message"=> "Data kendaraan berhasil ditambahkan",
                "data"=> $kendaraan
            ], 201);
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan kendaraan", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "Data kendaraan gagal ditambahkan",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function show(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        Log::info("Data kendaraan ditemukan", ["kendaraan id"=> $kendaraan->kendaraan_id]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data kendaraan",
            "data"=> $kendaraan,
        ],200);
    }

    public function update(KendaraanRequest $request, string $id)
    {
        try {
            $kendaraan = Kendaraan::findOrFail($id);

            $kendaraan = $kendaraan->update($request->validated());

            Log::info("Berhasil mengupdate kendaraan", ["kendaraan id"=> $kendaraan->kendaraan_id]);

            return response()->json([
                "status"=> "success",
                "message"=> "kendaraan berhasil diupdate",
                "data"=> $kendaraan,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate kendaraan", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "kendaraan gagal diupdate",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->delete();

        Log::info("Berhasil menghapus data kendaraan", ["kendaraan id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "kendaraan berhasil dihapus",
        ], 200);
    }
}
