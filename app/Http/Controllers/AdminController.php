<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $pemesananData = DB::table('pemesanans')
            ->selectRaw('MONTHNAME(created_at) as month, COUNT(*) as total')
            ->groupByRaw('MONTHNAME(created_at), MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();


        $labels = $pemesananData->pluck('month');
        $data = $pemesananData->pluck('total');

        $pemesanans = Pemesanan::with('getDriver')->get();

        $total = $pemesananData->sum('total');

        $totalRequest = Pemesanan::where('status_pengajuan', 'Menunggu')->count();
        $totalKendaraan = Kendaraan::all()->count();

        return view('admin.index', compact('labels', 'data', 'total', 'totalRequest', 'totalKendaraan', 'pemesanans'));
    }
}
