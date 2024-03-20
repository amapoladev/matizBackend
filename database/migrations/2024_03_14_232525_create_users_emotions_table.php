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
        // Schema::create('users_emotions', function (Blueprint $table) {
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('emotion_id');
            
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('emotion_id')->references('id')->on('emotions')->onDelete('cascade');
        //     $table->timestamps();
        // });

     //schema2:    
    //     Schema::create('users_emotions', function (Blueprint $table) {
    //         $table->unsignedBigInteger('user_id');
    //         $table->unsignedBigInteger('emotion_id');
    //         $table->enum('intensity', ['alta', 'media', 'baja']); // Agrega la columna para la intensidad
        
    //         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    //         $table->foreign('emotion_id')->references('id')->on('emotions')->onDelete('cascade');
    //         $table->unique(['user_id', 'emotion_id', 'intensity']); // Clave única para evitar duplicados por día
    //         $table->timestamps();
    //     });
    // }

    Schema::create('users_emotions', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('emotion_id');
        $table->enum('intensity', ['alta', 'media', 'baja']); // Agrega la columna para la intensidad
        $table->date('journal_date'); // Agrega la columna para la fecha del diario
        $table->timestamps();
    
        // Ajusta la restricción de unicidad para la combinación de user_id, emotion_id, journal_date e intensity
        $table->unique(['user_id', 'emotion_id', 'journal_date', 'intensity']);
    
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('emotion_id')->references('id')->on('emotions')->onDelete('cascade');
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
