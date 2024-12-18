<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PemesananRequest;
use App\Models\Kantor;
use App\Models\Kendaraan;
use App\Models\Pegawai;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemesananExport;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('getKendaraan', 'getLokasi', 'getDriver', 'getPengesah')->get();

        Log::info(" Berhasil mengambil data pemesanan", ["total data" => count($pemesanans)]);

        return view("admin.pemesanan.index", compact("pemesanans"));
    }

    public function create() {
        $kantors = Kantor::all();
        $kendaraans = Kendaraan::all();
        $pegawais = Pegawai::all();

        return view("admin.pemesanan.add", compact("kantors","kendaraans","pegawais"));
    }

    public function store(PemesananRequest $request)
    {
        try {

            /* Pencarian pimpinan id */
            $driver = Pegawai::find($request->driver_id);
            
            /* Merge pengesah_id untuk ditambahkan pada data pemesanan */
            $pemesananData = $request->validated();
            $pemesananData['pengesah_id'] = $driver ? $driver->pimpinan_id : null;

            $pemesanan = Pemesanan::create($pemesananData);

            Log::info("Berhasil menambahkan data pemesanan", ["pemesanan id"=> $pemesanan->pemesanan_id]);

            return redirect()->route("pemesanan")->with("success","Berhasil menambahkan data pemesanan");
        } catch (\Exception $e) {
            Log::error("Gagal menambahkan data pemesanan", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("pemesanan.add")->with("error", "Gagal menambahkan data pemesanan");
        }
    }

    public function show(string $id)
    {
        $pemesanan = Pemesanan::with('getKendaraan', 'getLokasi', 'getDriver', 'getPengesah')->findOrFail($id);

        Log::info("Data pemesanan ditemukan", ["pemesanan id"=> $pemesanan->pemesanan_id]);

        return view("admin.pemesanan.detail", compact("pemesanan"));
    }

    public function edit(string $id) {
        $pemesanan = Pemesanan::findOrFail($id);
        $kantors = Kantor::all();
        $pegawais = Pegawai::all();
        $kendaraans = Kendaraan::all();

        return view("admin.pemesanan.edit", compact("pemesanan", "kantors", "pegawais", "kendaraans"));
    }

    public function update(PemesananRequest $request, string $id)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);

            /* Pencarian pimpinan id */
            $driver = Pegawai::find($request->driver_id);
            
            $pemesananData = $request->validated();
            
            /* Merge pengesah_id jika driver_id berubah */
            if ($pemesanan->driver_id != $request->driver_id) {
                Log::info("Driver ID berubah", ['old_driver' => $pemesanan->driver_id, 'new_driver' => $request->driver_id]);
                $pemesananData['pengesah_id'] = $driver ? $driver->pimpinan_id : null;
            } else {
                Log::info("Driver ID tidak berubah");
            }

            $pemesanan->update($pemesananData);

            Log::info("Berhasil mengupdate pemesanan", ["pemesanan id"=> $pemesanan->id]);

            return redirect()->route("pemesanan")->with("success","Berhasil mengupdate pemesanan");
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate pemesanan", ["error_message"=> $e->getMessage()]);
            
            return redirect()->route("pemesanan.edit")->with("error", "Gagal mengupdate pemesanan");
        }
    }

    public function export()
    {
        return Excel::download(new PemesananExport, 'data_pemesanan.xlsx');
    }

    public function destroy(string $id)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);

            $pemesanan->delete();

            Log::info("Berhasil menghapus data pemesanan", ["pemesanan id"=> $id]);

            return redirect()->route("pemesanan")->with("success","Berhasil menghapus data pemesanan");
        } catch (\Exception $e) {
            Log::error("Gagal menghapus data pemesanan", ["error_message"=> $e->getMessage()]);

            return redirect()->route("pemesanan")->with("error", "Gagal menghapus data pemesanan");
        }
    }
}
