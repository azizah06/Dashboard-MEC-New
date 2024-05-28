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
            $table->foreignId('pelajaran_id')->constrained('pelajaran');
            $table->foreignId('user_id')->constrained('users');
            $table->string('slug');
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
