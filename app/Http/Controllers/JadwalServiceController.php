<?php

namespace App\Http\Controllers;

use App\Models\JadwalService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class JadwalServiceController extends Controller
{
    public function index()
    {
        $jadwal_service = JadwalService::all();

        Log::info(" Berhasil mengambil data jadwal service", ["total data" => count($jadwal_service)]);

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data jadwal service",
            "data"=> $jadwal_service,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "tanggal_service"=> "required|date",
            "jarak_tempuh"=> "required|numeric",
        ], [
            "nomor_polisi.required"=> "Nomor polisi harus diisi",
            "jarak_tempuh.required"=> "Jarak tempuh harus diisi",
            "jenis_jadwal_service.required"=> "Jenis jadwal_service harus diisi",
            "konsumsi_bbm.required"=> "Konsumsi BBM harus diisi",
            "status_kepemilikan.required"=> "Statu kepemilikan harus diisi",
            "jarak_tempuh.numeric"=> "Jarak tempuh harus berupa angka",
            "jenis_jadwal_service.enum"=> "Jenis jadwal_service harus Angkutan Orang atau Angkutan Barang",
            "konsumsi_bbm.numeric"=> "Konsumsi BBM harus berupa angka",
            "status_kepemilikan.enum"=> "Status kepemilikan harus Milik Perusahaan atau Sewa",
        ]);

        try {
            $jadwal_service = new JadwalService([
                "nomor_polisi"=> $request->nomor_polisi,
                "jarak_tempuh"=> $request->jarak_tempuh,
                "jenis_jadwal_service"=> $request->jenis_jadwal_service,
                "konsumsi_bbm"=> $request->konsumsi_bbm,
                "status_kepemilikan"=> $request->status_kepemilikan,
            ]);

            $jadwal_service->save();

            Log::info("Berhasil menambahkan jadwal_service", ["nomor polisi jadwal_service"=> $jadwal_service->nomor_polisi]);

            return response()->json([
                "status"=> "success",
                "message"=> "Data jadwal_service berhasil ditambahkan",
                "data"=> $jadwal_service
            ], 201);
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan jadwal_service", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "Data jadwal_service gagal ditambahkan",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function show(string $id)
    {
        $jadwal_service = JadwalService::find($id);

        Log::info("Data jadwal_service ditemukan", ["nomor polisi jadwal_service"=> $jadwal_service->nomor_polisi]);

        if (!$jadwal_service) {
            Log::error("Gagal menemukan data jadwal_service", ["jadwal_service id"=> $id]);
            return response()->json([
                "status"=> "failed",
                "message"=> "jadwal_service tidak ditemukan",
            ], 404);
        }

        return response()->json([
            "status"=> "success",
            "message"=> "Berhasil mengambil data jadwal_service",
            "data"=> $jadwal_service,
        ],200);
    }

    public function update(Request $request, string $id)
    {
        try {
            $jadwal_service = JadwalService::find($id);

            if (!$jadwal_service) {
                Log::error("Gagal menemukan data jadwal_service", ["jadwal_service id"=> $id]);
                return response()->json([
                    "status"=> "failed",
                    "message"=> "jadwal_service tidak ditemukan",
                ], 404);
            }

            $request->validate([
                "nomor_polisi"=> "required|string",
                "jarak_tempuh"=> "required|numeric",
                "jenis_jadwal_service"=> "required|string|in:Angkutan Orang,Angkutan Barang",
                "konsumsi_bbm"=> "required|numeric",
                "status_kepemilikan"=> "required|string|in:Milik Perusahaan,Sewa",
            ], [
                "nomor_polisi.required"=> "Nomor polisi harus diisi",
                "jarak_tempuh.required"=> "Jarak tempuh harus diisi",
                "jenis_jadwal_service.required"=> "Jenis jadwal_service harus diisi",
                "konsumsi_bbm.required"=> "Konsumsi BBM harus diisi",
                "status_kepemilikan.required"=> "Statu kepemilikan harus diisi",
                "jarak_tempuh.numeric"=> "Jarak tempuh harus berupa angka",
                "jenis_jadwal_service.enum"=> "Jenis jadwal_service harus Angkutan Orang atau Angkutan Barang",
                "konsumsi_bbm.numeric"=> "Konsumsi BBM harus berupa angka",
                "status_kepemilikan.enum"=> "Status kepemilikan harus Milik Perusahaan atau Sewa",
            ]);

            $jadwal_service->update([
                "nomor_polisi"=> $jadwal_service->nomor_polisi,
                "jarak_tempuh"=> $jadwal_service->jarak_tempuh,
                "jenis_jadwal_service"=> $jadwal_service->jenis_jadwal_service,
                "konsumsi_bbm"=> $jadwal_service->konsumsi_bbm,
                "status_kepemilikan"=> $jadwal_service->status_kepemilikan,
            ]);

            Log::info("Berhasil mengupdate jadwal_service", ["nomor polisi jadwal_service"=> $jadwal_service->nomor_polisi]);

            return response()->json([
                "status"=> "success",
                "message"=> "jadwal_service berhasil diupdate",
                "data"=> $jadwal_service,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate jadwal_service", ["error_message"=> $e->getMessage()]);
            return response()->json([
                "status"=> "failed",
                "message"=> "jadwal_service gagal diupdate",
                "error"=> $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $jadwal_service = JadwalService::find($id);

        if (!$jadwal_service) {
            Log::error("Gagal menemukan data jadwal_service", ["jadwal_service id"=> $id]);
            return response()->json([
                "status"=> "failed",
                "message"=> "jadwal_service tidak ditemukan",
            ],404);
        }

        $jadwal_service->delete();

        Log::info("Berhasil menghapus data jadwal_service", ["jadwal_service id"=> $id]);

        return response()->json([
            "status"=> "success",
            "message"=> "jadwal_service berhasil dihapus",
        ], 200);
    }
}
