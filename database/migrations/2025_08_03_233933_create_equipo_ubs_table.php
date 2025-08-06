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
        Schema::create('equipo_ubs', function (Blueprint $table) {
            $table->string('serialUb')->primary();
            $table->string('estado')->default('operativo');
            $table->string('versionUman');
            $table->string('versionraspberry');
            $table->string('versioUps')->nullable();
            $table->string('PcbUman');
            $table->string('PcbAntena');
            $table->string('Radiometrix');
            $table->date('fechaFabricacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_ubs');
    }
};
