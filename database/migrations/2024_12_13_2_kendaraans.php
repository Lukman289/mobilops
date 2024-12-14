<?php

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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_polisi')->unique();
            $table->double('jarak_tempuh');
            $table->enum('jenis_kendaraan',['Angkutan Orang','Angkutan Barang']);
            $table->float('konsumsi_bbm');
            $table->enum('status_kepemilikan', ['Milik Perusahaan', 'Sewa']);
            $table->unsignedBigInteger('lokasi_kendaraan_id')->nullable();
            $table->timestamps();

            $table->foreign('lokasi_kendaraan_id')->references('id')->on('kantors')->onDelete('set Null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
