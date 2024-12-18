<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PegawaiRequest;
use App\Models\Kantor;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with('lokasiBekerja', 'pimpinan')->orderBy('kantor_id', 'asc')->get();

        Log::info(" Berhasil mengambil data pegawai", ["total data" => count($pegawais)]);

        return view("admin.pegawai.index", compact("pegawais"));
    }

    public function create() {
        $kantors = Kantor::class::all();
        $pemimpins = Pegawai::where("jabatan", "Pimpinan")->get();

        return view("admin.pegawai.add", compact("kantors","pemimpins"));
    }

    public function store(PegawaiRequest $request)
    {
        try {
            $pegawai = Pegawai::create($request->validated());

            Log::info("Berhasil menambahkan data pegawai", ["nama pegawai"=> $pegawai->nama_pegawai]);

            return redirect()->route("pegawai")->with("success","Berhasil menambahkan data pegawai");
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data pegawai", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("pegawai.add")->with("error","Gagal menambahkan data pegawai");
        }
    }

    public function show(string $id)
    {
        $pegawai = Pegawai::with('lokasiBekerja', 'pimpinan')->findOrFail($id);

        Log::info("Data pegawai ditemukan", ["nama pegawai"=> $pegawai->nama_pegawai]);

        return view("admin.pegawai.detail", compact("pegawai"));
    }

    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $kantors = Kantor::all();
        $pemimpins = Pegawai::where('jabatan', 'Pimpinan')->get();

        return view("admin.pegawai.edit", compact("pegawai", "kantors", "pemimpins"));
    }

    public function update(PegawaiRequest $request, string $id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);

            $pegawai->update($request->validated());

            Log::info("Berhasil mengupdate pegawai", ["nama pegawai"=> $pegawai->nama_pegawai]);

            return redirect()->route("pegawai")->with("success","Berhasil mengupdate pegawai");
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate pegawai", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("pegawai.edit")->with("error","Gagal mengupdate pegawai");
        }
    }

    public function destroy(string $id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);

            $pegawai->delete();

            Log::info("Berhasil menghapus data pegawai", ["pegawai id"=> $id]);

            return redirect()->route("pegawai")->with("success","Berhasil menghapus data pegawai");
        } catch (\Exception $e) {
            Log::error("Gagal menghapus data pegawai", ["error_message"=> $e->getMessage()]);

            return redirect()->route("pegawai")->with("error","Gagal menghapus data pegawai");
        }
    }
}
