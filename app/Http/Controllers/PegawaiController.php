<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();

        Log::info(" Berhasil mengambil data pegawai", ["total data" => count($pegawai)]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data pegawai",
            "data"=> $pegawai,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $pegawai = Pegawai::create($request->validated());

            Log::info("Berhasil menambahkan data pegawai", ["nama pegawai"=> $pegawai->nama_pegawai]);

            return response()->json([
                "status"=> "success",
                "message"=> "Data pegawai berhasil ditambahkan",
                "data"=> $pegawai
            ], 201);
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data pegawai", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "data pegawai gagal ditambahkan",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        Log::info("Data pegawai ditemukan", ["nama pegawai"=> $pegawai->nama_pegawai]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data pegawai",
            "data"=> $pegawai,
        ],200);
    }

    public function update(Request $request, string $id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);

            $pegawai = $pegawai::update($request->validated());

            Log::info("Berhasil mengupdate pegawai", ["nama pegawai"=> $pegawai->nama_pegawai]);

            return response()->json([
                "status"=> "success",
                "message"=> "pegawai berhasil diupdate",
                "data"=> $pegawai,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate pegawai", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "pegawai gagal diupdate",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->delete();

        Log::info("Berhasil menghapus data pegawai", ["pegawai id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "pegawai berhasil dihapus",
        ], 200);
    }
}
