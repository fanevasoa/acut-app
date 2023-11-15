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
        Schema::create('timing_regroupements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_regroupement')->references('id')->on('regroupements');
            $table->foreignId('id_chant')->nullable()->references('id')->on('chants');
            $table->string('designation');
            $table->string('type_timing');
            $table->text('contenu_detaille')->nullable();
            $table->unsignedInteger('chronologie');
            $table->json('structure_chant')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timing_regroupements');
    }
};
