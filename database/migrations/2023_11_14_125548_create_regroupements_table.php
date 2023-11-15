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
        Schema::create('regroupements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_regroupement');
            $table->string('nom');
            $table->string('theme')->nullable();
            $table->string('type_regroupement');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regroupements');
    }
};
