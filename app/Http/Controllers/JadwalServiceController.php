<?php

namespace App\Http\Controllers;

use App\Models\JadwalService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\JadwalServiceRequest;
use App\Models\Kendaraan;

class JadwalServiceController extends Controller
{
    public function index()
    {
        $jadwalServices = JadwalService::with("getKendaraan")->get();

        Log::info(" Berhasil mengambil data jadwal service", ["total data" => count($jadwalServices)]);

        return view("admin.service.index", compact("jadwalServices"));
    }

    public function create() {
        $kendaraans = Kendaraan::all();

        return view("admin.service.add", compact("kendaraans"));
    }

    public function store(JadwalServiceRequest $request)
    {
        try {
            $jadwalService = JadwalService::create($request->validated());

            Log::info("Berhasil menambahkan jadwal service", ["nomor polisi jadwal service"=> $jadwalService->id]);

            return redirect()->route("service")->with("success","Berhasil menambahkan jadwal service");
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan jadwalService", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("service.add")->with("error", "Gagal menambahkan jadwal service");
        }
    }

    public function show(string $id)
    {
        $jadwalService = JadwalService::with("getKendaraan")->findOrFail($id);

        Log::info("Data jadwal service ditemukan", ["nomor polisi jadwal service"=> $jadwalService->id]);

        return view("admin.service.detail", compact("jadwalService"));
    }

    public function edit(string $id)    
    {
        $jadwalService = JadwalService::with("getKendaraan")->findOrFail($id);
        $kendaraans = Kendaraan::all();

        return view("admin.service.edit", compact("jadwalService", "kendaraans"));
    }

    public function update(JadwalServiceRequest $request, string $id)
    {
        try {
            $jadwalService = JadwalService::findOrFail($id);

            $jadwalService->update($request->validated());

            Log::info("Berhasil mengupdate jadwal service", ["nomor polisi jadwal service"=> $jadwalService->id]);

            return redirect()->route("service")->with("success","Berhasil mengupdate jadwal service");
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate jadwal service", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("service.edit")->with("error", "Gagal mengupdate jadwal service");
        }
    }

    public function destroy(string $id)
    {
        try {
            $jadwalService = JadwalService::findOrFail($id);

            $jadwalService->delete();

            Log::info("Berhasil menghapus data jadwal service", ["jadwal service id"=> $id]);

            return redirect()->route("service")->with("success","Berhasil menghapus data jadwal service");
        } catch (\Exception $e) {
            Log::error("Gagal menghapus data jadwal service", ["error_message"=> $e->getMessage()]);

            return redirect()->route("service")->with("error", "Gagal menghapus data jadwal service");
        }
    }
}
