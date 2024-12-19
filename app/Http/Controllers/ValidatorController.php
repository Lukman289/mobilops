<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ValidatorController extends Controller
{
    public function index() {
        $pemesanans = Pemesanan::with('getKendaraan', 'getLokasi', 'getDriver', 'getPengesah')->get();

        Log::info(" Berhasil mengambil data pemesanan", ["total data" => count($pemesanans)]);

        return view("validator.index", compact("pemesanans"));
    }   
    
    public function approve(Request $request, string $id) 
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);

            $pemesanan->update($request->all());

            return redirect()->route('validator')->with("success", "Pemesanan berhasil $request->status_pengajuan");
        } catch (\Exception $e) {
            Log::error("Gagal mengupdate pemesanan", ["error" => $e->getMessage()]);
            return redirect()->route('validator')->with("error", "Gagal merubah status pemesanan");
        }

    }
}
