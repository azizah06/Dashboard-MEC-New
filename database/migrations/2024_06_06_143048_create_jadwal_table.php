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
        Schema::create('jadwal',function(blueprint $table){
            $table->id();
            $table->string('kd_jadwal')->unique();

            $table->bigInteger('mentor_id')->unsigned();
            $table->foreign('mentor_id')->references('id')->on('mentor');

            $table->bigInteger('sarpra_id')->unsigned();
            $table->foreign('sarpra_id')->references('id')->on('sarpra');

            $table->bigInteger('pkt_kelas_id')->unsigned();
            $table->foreign('pkt_kelas_id')->references('id')->on('pkt_kelas');

            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_akhir');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
