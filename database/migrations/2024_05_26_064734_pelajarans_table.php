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
        Schema::create('pelajaran',function(Blueprint $table){
            $table->id();
            $table->foreignId('pendidikans_id')->constraind('pendidikan');
            $table->string('slug');
            $table->string('nama_pelajaran');
            $table->integer('harga_pelajaran');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajaran');
    }
};
