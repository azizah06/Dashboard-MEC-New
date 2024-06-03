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
        Schema::create('mentor',function(blueprint $table){
            $table->id();
            $table->string('kode_mentor')->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telepon');
            $table->foreignId('jenisKelamins')->constraint('jenis_kelamins');
            $table->string('pendidikan');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor');
    }
};



