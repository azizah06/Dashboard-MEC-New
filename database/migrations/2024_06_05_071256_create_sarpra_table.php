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
        Schema::create('sarpra', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kd_sarpra')->unique();
            $table->string('nama_ruangan');
            $table->integer('kapasitas');
            $table->integer('jmlh_baik');
            $table->integer('jmlh_rusak');
            $table->integer('meja_mentor');
            $table->integer('kursi_mentor');
            $table->integer('kursi_meja_siswa');
            $table->integer('kipas');
            $table->integer('papan_tulis');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarpra');
    }
};
