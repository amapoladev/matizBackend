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
        Schema::create('emotions_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_eu');
            $table->unsignedBigInteger('emotion_id_eu');
            $table->foreign('user_id_eu')->references('id')->on('users');
            $table->foreign('emotion_id_eu')->references('id')->on('emotions');
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
