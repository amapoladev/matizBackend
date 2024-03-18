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
        Schema::create('users_emotions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('emotion_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('emotion_id')->references('id')->on('emotions')->onDelete('cascade');
        
            // No necesitamos una clave primaria independiente en la tabla pivote
            // La combinación de user_id y emotion_id servirá como clave primaria compuesta
        
            // Opcionalmente, puedes agregar índices únicos para prevenir la duplicación de registros
            // $table->unique(['user_id', 'emotion_id']);
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_emotions');
    }
};
