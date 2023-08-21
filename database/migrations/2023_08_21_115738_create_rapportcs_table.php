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
        Schema::create('rapportcs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('officier_id')->constrained();
            $table->foreignId('procureur_id')->constrained();
            $table->String('libelle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapportcs');
    }
};
