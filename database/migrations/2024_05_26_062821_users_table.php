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
        Schema::create('userss',function (Blueprint $table){
            $table->char('user_id',30)->primary();
            $table->string('slug')->unique();
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('status');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
