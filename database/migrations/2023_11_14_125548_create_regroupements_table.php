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
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('regroupements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_regroupement');
            $table->string('nom');
            $table->string('theme')->nullable();
            $table->string('type_regroupement');
            $table->text('description')->nullable();
            $table->foreignId('id_responsable')->nullable()->references('id')->on('associations');
            $table->timestamps();
        });

        Schema::create('participations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_regroupement')->references('id')->on('regroupements');
            $table->string('role_regroupement');
            $table->timestamps();
        });

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

        Schema::create('association_membres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_membre')->references('id')->on('users');
            $table->foreignId('id_association')->references('id')->on('associations');
            $table->string('role_association');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association_membres');
        Schema::dropIfExists('timing_regroupements');
        Schema::dropIfExists('participations');
        Schema::dropIfExists('regroupements');
        Schema::dropIfExists('associations');
    }
};
