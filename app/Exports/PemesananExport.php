<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PemesananExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemesanan::all();
    }
    public function headings(): array
    {
        return [
            'ID Pemesanan',
            'Status Pengajuan',
            'Tanggal Pemesanan',
            'Tanggal Pemakaian',
            'Kendaraan ID',
            'Lokasi Peminjaman ID',
            'Driver ID',
            'Pengesah ID',
            'Created At',
            'Updated At'
        ];
    }

    public function map($pemesanan): array
    {
        return [
            $pemesanan->id,
            $pemesanan->tanggal_pemesanan,
            $pemesanan->tanggal_pemakaian,
            $pemesanan->getKendaraan->nomor_polisi,
            $pemesanan->getLokasi->nama_kantor,
            $pemesanan->getDriver->nama_pegawai,
            $pemesanan->getPengesah->nama_pegawai,
            $pemesanan->status_pengajuan,
            $pemesanan->created_at,
            $pemesanan->updated_at,
        ];
    }
}
