<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->enum('status_pengajuan', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu');
            $table->dateTime('tanggal_pemesanan')->default(Carbon::now());
            $table->dateTime('tanggal_pemakaian');
            $table->unsignedBigInteger('kendaraan_id')->nullable();
            $table->unsignedBigInteger('lokasi_peminjaman_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('pengesah_id')->nullable();
            $table->timestamps();

            $table->foreign('kendaraan_id')->references('id')->on('kendaraans')->onDelete('set Null');
            $table->foreign('lokasi_peminjaman_id')->references('id')->on('kantors')->onDelete('set Null');
            $table->foreign('driver_id')->references('id')->on('pegawais')->onDelete('set Null');
            $table->foreign('pengesah_id')->references('id')->on('pegawais')->onDelete('set Null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
