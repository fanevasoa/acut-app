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
        Schema::create('location_chant_dans_livre', function (Blueprint $table) {
            $table->foreignId('id_chant')->references('id')->on('chants');
            $table->foreignId('id_livret_chant')->references('id')->on('livret_chants');
            $table->integer('numero_page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_chant_dans_livre');
    }
};
