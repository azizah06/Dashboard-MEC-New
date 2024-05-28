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
        Schema::create('tentor',function(blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('slug');
            $table->foreignId('pendidikan_id')->constrained('pendidikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentor');
    }
};
