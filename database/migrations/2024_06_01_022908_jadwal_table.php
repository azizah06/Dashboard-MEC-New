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
            $table->string('kode_jadwal')->unique();
            $table->foreignId('mentors_id')->constraint(table:'mentor',indexName:'mentor_id');
            $table->foreignId('sarprass_id')->constraint('sarpras');
            $table->foreignId('Kelass')->constraint('kelas');
            $table->date('hari');
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





