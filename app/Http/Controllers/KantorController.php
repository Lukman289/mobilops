<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kantor;
use Illuminate\Support\Facades\Log;

class KantorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kantor = Kantor::all();

        Log::info(" Berhasil mengambil data kantor", ["total data" => count($kantor)]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data kantor",
            "data"=> $kantor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama_kantor"=> "required|string",
        ], [
            "nama_kantor.required"=> "Nama kantor harus diisi",
            "nama_kantor.string"=> "Nama kantor harus berupa string",
        ]);

        try {
            $kantor = new Kantor([
                "nama_kantor"=> $request->name,
            ]);

            $kantor->save();

            Log::info("Berhasil menambahkan data kantor", ["nama kantor"=> $request->name]);

            return response()->json([
                "status"=> "success",
                "message"=> "Data kantor berhasil ditambahkan",
                "data"=> $kantor
            ], 201);
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data kantor", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "data kantor gagal ditambahkan",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kantor = Kantor::find($id);

        Log::info("Data kantor ditemukan", ["nama kantor"=> $kantor->nama_kantor]);

        if (!$kantor) {
            Log::error("Gagal menemukan data kantor", ["kantor id"=> $id]);
            return response()->json([
                "status"=> "failed",
                "message"=> "Kantor tidak ditemukan",
            ], 404);
        }

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data kantor",
            "data"=> $kantor,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $kantor = Kantor::find($id);

            if (!$kantor) {
                Log::error("Gagal menemukan data kantor", ["kantor id"=> $id]);
                return response()->json([
                    "status"=> "failed",
                    "message"=> "Kantor tidak ditemukan",
                ], 404);
            }

            $request->validate([
                "nama_kantor"=> "required|string",
            ], [
                "nama_kantor.required"=> "Nama kantor harus diisi",
                "nama_kantor.string"=> "Nama kantor harus berupa string",
            ]);

            $kantor->update([
                "nama_kantor"=> $request->name,
            ]);

            Log::info("Berhasil mengupdate kantor", ["nama kantor"=> $request->name]);

            return response()->json([
                "status"=> "success",
                "message"=> "Kantor berhasil diupdate",
                "data"=> $kantor,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate kantor", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "Kantor gagal diupdate",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kantor = Kantor::find($id);

        if (!$kantor) {
            Log::error("Gagal menemukan data kantor", ["kantor id"=> $id]);
            return response()->json([
                "status"=> "failed",
                "message"=> "Kantor tidak ditemukan",
            ],404);
        }

        $kantor->delete();

        Log::info("Berhasil menghapus data kantor", ["kantor id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "Kantor berhasil dihapus",
        ], 200);
    }
}
