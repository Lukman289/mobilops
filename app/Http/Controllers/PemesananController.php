<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PemesananRequest;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();

        Log::info(" Berhasil mengambil data pemesanan", ["total data" => count($pemesanan)]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data pemesanan",
            "data"=> $pemesanan,
        ]);
    }

    public function store(PemesananRequest $request)
    {
        try {
            $pemesanan = Pemesanan::create($request->validated());

            Log::info("Berhasil menambahkan data pemesanan", ["pemesanan id"=> $pemesanan->pemesanan_id]);

            return response()->json([
                "status"=> "success",
                "message"=> "Data pemesanan berhasil ditambahkan",
                "data"=> $pemesanan
            ], 201);
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data pemesanan", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "data pemesanan gagal ditambahkan",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function show(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        Log::info("Data pemesanan ditemukan", ["pemesanan id"=> $pemesanan->pemesanan_id]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data pemesanan",
            "data"=> $pemesanan,
        ],200);
    }

    public function update(PemesananRequest $request, string $id)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);

            $pemesanan = $pemesanan::update($request->validated());

            Log::info("Berhasil mengupdate pemesanan", ["pemesanan id"=> $pemesanan->pemesanan_id]);

            return response()->json([
                "status"=> "success",
                "message"=> "pemesanan berhasil diupdate",
                "data"=> $pemesanan,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate pemesanan", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "pemesanan gagal diupdate",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $pemesanan = pemesanan::findOrFail($id);

        $pemesanan->delete();

        Log::info("Berhasil menghapus data pemesanan", ["pemesanan id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "pemesanan berhasil dihapus",
        ], 200);
    }
}
