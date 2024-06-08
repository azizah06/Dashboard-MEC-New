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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kd_bayar')->unique();
            $table->foreignId('siswa_id')->nullable()->constrained('siswa')->onDelete('set null');
            $table->foreignId('pkt_kls_id')->nullable()->constrained('pkt_kelas')->onDelete('set null');
            $table->string('nama_siswa');
            $table->string('paket_kelas');
            $table->string('harga_bayar');
            $table->date('tgl_bayar');
            $table->string('bukti_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
