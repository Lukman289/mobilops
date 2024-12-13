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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('pegawai_id');
            $table->string('nama_pegawai');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->enum('jabatan', ['Pimpinan', 'Pegawai']);
            $table->unsignedBigInteger('kantor_id')->nullable();
            $table->unsignedBigInteger('pimpinan_id')->nullable();
            $table->timestamps();

            $table->foreign('kantor_id')->references('kantor_id')->on('kantors')->onDelete('set Null');
            $table->foreign('pimpinan_id')->references('pegawai_id')->on('pegawais')->onDelete('set Null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
