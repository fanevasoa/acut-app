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
    }
};
