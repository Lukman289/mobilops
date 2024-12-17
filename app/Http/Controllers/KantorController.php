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
        $kantors = Kantor::all();

        Log::info(" Berhasil mengambil data kantor", ["total data" => count($kantors)]);

        return view("admin.kantor.index", ["kantors"=> $kantors]);
    }

    public function create()
    {
        return view("admin.kantor.add");
    }

    public function store(KantorRequest $request)
    {
        try {
            $kantors = Kantor::create($request->validated());

            Log::info("Berhasil menambahkan data kantor", ["nama kantor"=> $kantors->nama_kantor]);

            return redirect()->route("kantor")->with("success","Berhasil menambahkan data kantor");
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data kantor", ["error_message"=> $e->getMessage()]);

            return redirect()->route("admin.kantor.add")->with("error","Galat menambahkan data kantor");
        }
    }

    public function show(string $id)
    {
        $kantor = Kantor::with(['getKendaraan', 'getPegawai'])->findOrFail($id);

        $jumlahKendaraan = $kantor->getKendaraan->count();
        $jumlahPegawai = $kantor->getPegawai->count();
        
        Log::info("Data kantor ditemukan", ["nama kantor"=> $kantor->nama_kantor, "jumlah kendaraan"=> $jumlahKendaraan, "jumlah pegawai"=> $jumlahPegawai]);
        
        return view('admin.kantor.detail', compact('kantor', 'jumlahKendaraan', 'jumlahPegawai'));
    }

    public function edit($id)
    {
        $kantor = Kantor::findOrFail($id);
        return view('admin.kantor.edit', compact('kantor'));
    }

    public function update(KantorRequest $request, string $id)
    {
        try {
            $kantor = Kantor::findOrFail($id);

            $kantor->update($request->validated());

            Log::info("Berhasil mengupdate kantor", ["nama kantor"=> $kantor->nama_kantor]);

            return redirect()->route("kantor")->with("success","Berhasil mengupdate kantor");
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate kantor", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("kantor.edit")->with("error", "Gagal mengupdate kantor");
        }
    }

    public function destroy(string $id)
    {
        $kantors = Kantor::findOrFail($id);

        $kantors->delete();

        Log::info("Berhasil menghapus data kantor", ["kantor id"=> $id]);

        return redirect()->route("kantor")->with("success","Berhasil menghapus data kantor");
    }
}
