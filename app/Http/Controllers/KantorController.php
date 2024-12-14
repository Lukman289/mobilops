<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kantor;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\KantorRequest;

class KantorController extends Controller
{
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

    public function store(Request $request)
    {
        try {
            $kantor = Kantor::create($request->validated());

            Log::info("Berhasil menambahkan data kantor", ["nama kantor"=> $kantor->nama_kantor]);

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

    public function show(string $id)
    {
        $kantor = Kantor::findOrFail($id);

        Log::info("Data kantor ditemukan", ["nama kantor"=> $kantor->nama_kantor]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data kantor",
            "data"=> $kantor,
        ],200);
    }

    public function update(Request $request, string $id)
    {
        try {
            $kantor = Kantor::findOrFail($id);

            $kantor = $kantor::update($request->validated());

            Log::info("Berhasil mengupdate kantor", ["nama kantor"=> $kantor->nama_kantor]);

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

    public function destroy(string $id)
    {
        $kantor = Kantor::findOrFail($id);

        $kantor->delete();

        Log::info("Berhasil menghapus data kantor", ["kantor id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "Kantor berhasil dihapus",
        ], 200);
    }
}
