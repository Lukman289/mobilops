<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KendaraanRequest;
use App\Models\Kantor;

class KendaraanController extends Controller
{
    public function index(): Factory|View
    {
        $kendaraans = Kendaraan::with('lokasiKendaraan')->get();

        Log::info("Berhasil mengambil data kendaraan", ["total data" => count($kendaraans)]);

        return view("admin.kendaraan.index", compact("kendaraans"));
    }

    public function create() {
        $kantors = Kantor::all();

        Log::info("Berhasil mengambil data kantor", ["total data" => count($kantors)]);

        return view("admin.kendaraan.add", compact("kantors"));
    }

    public function store(KendaraanRequest $request): RedirectResponse
    {
        try {
            $kendaraan = Kendaraan::create($request->validated());

            Log::info("Berhasil menambahkan kendaraan", ["kendaraan id"=> $kendaraan->id]);
            Log::info("Berhasil menambahkan kendaraan", ["isi data"=> $kendaraan]);

            return redirect()->route("kendaraan")->with("success", "Data kendaraan berhasil ditambahkan");
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan kendaraan", ["error_message"=> $e->getMessage()]);

            return redirect()->route("kendaraan.create")->with("error", "Data kendaraan gagal ditambahkan");
        }
    }

    public function show(string $id): Factory|View
    {
        $kendaraan = Kendaraan::with('lokasiKendaraan')->findOrFail($id);


        Log::info("Data kendaraan ditemukan", ["data"=> $kendaraan]);
        Log::info("Data kendaraan ditemukan", ["kendaraan id"=> $kendaraan->id]);

        return view("admin.kendaraan.detail", compact("kendaraan"));
    }

    public function edit(string $id): Factory|View
    {
        $kendaraan = Kendaraan::with('lokasiKendaraan')->findOrFail($id);
        $kantors = Kantor::all();

        return view("admin.kendaraan.edit", compact("kendaraan", "kantors"));
    }

    public function update(KendaraanRequest $request, string $id): RedirectResponse
    {
        try {
            $kendaraan = Kendaraan::findOrFail($id);

            $kendaraan->update($request->validated());
            
            Log::info("Berhasil mengupdate kendaraan", ["kendaraan id"=> $id]);

            return redirect()->route("kendaraan")->with("success","Kendaraan $kendaraan->nomor_polisi berhasil diupdate");
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate kendaraan", ["error_message"=> $e->getMessage()]);

            return redirect()->route("kendaraan.edit", $id)->with("error", "Data kendaraan gagal diupdate");
        }
    }

    public function destroy(string $id): RedirectResponse
    {
        Log::info("delete", ["delete id"=> $id]);
        try {
            $kendaraan = Kendaraan::findOrFail($id);

            $kendaraan->delete();

            Log::info("Berhasil menghapus data kendaraan", ["kendaraan id"=> $id]);

            return redirect()->route("kendaraan", $id)->with("success", "Kendaraan $kendaraan->nomor_polisi berhasil dihapus");
        } catch (\Exception $e) {
            Log::error("Gagal menghapus kendaraan", ["error_message"=> $e->getMessage()]);

            return redirect()->route("kendaraan", $id)->with("error", 'Data kendaraan gagal dihapus');
        }
    }
}
