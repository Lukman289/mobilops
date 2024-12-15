<?php

namespace App\Http\Controllers;

use App\Models\JadwalService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\JadwalServiceRequest;

class JadwalServiceController extends Controller
{
    public function index()
    {
        $jadwalService = JadwalService::all();

        Log::info(" Berhasil mengambil data jadwal service", ["total data" => count($jadwalService)]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data jadwal service",
            "data"=> $jadwalService,
        ]);
    }

    public function store(JadwalServiceRequest $request)
    {
        try {
            $jadwalService = JadwalService::create($request->validated());

            Log::info("Berhasil menambahkan jadwal service", ["nomor polisi jadwal service"=> $jadwalService->id]);

            return response()->json([
                "status"=> "success",
                "message"=> "Data jadwal service berhasil ditambahkan",
                "data"=> $jadwalService
            ], 201);
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan jadwalService", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "Data jadwal service gagal ditambahkan",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function show(string $id)
    {
        $jadwalService = JadwalService::findOrFail($id);

        Log::info("Data jadwal service ditemukan", ["nomor polisi jadwal service"=> $jadwalService->id]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data jadwal service",
            "data"=> $jadwalService,
        ],200);
    }

    public function update(JadwalServiceRequest $request, string $id)
    {
        try {
            $jadwalService = JadwalService::findOrFail($id);

            $jadwalService->update($request->validated());

            Log::info("Berhasil mengupdate jadwal service", ["nomor polisi jadwal service"=> $jadwalService->id]);

            return response()->json([
                "status"=> "success",
                "message"=> "jadwal service berhasil diupdate",
                "data"=> $jadwalService,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate jadwal service", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "jadwal service gagal diupdate",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $jadwalService = JadwalService::findOrFail($id);

        $jadwalService->delete();

        Log::info("Berhasil menghapus data jadwal service", ["jadwal service id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "jadwal service berhasil dihapus",
        ], 200);
    }
}
