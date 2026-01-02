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
        Schema::create('check_faenas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tecnico_id')->constrained('tecnicos');
            $table->foreignId('faena_id')->constrained('faenas');
            $table->foreignId('equipo_minero_id')->constrained('equipo_minero');
            $table->date('fecha_ingreso');
            $table->boolean('caja_uman')->default(true);
            $table->boolean('hmi')->default(true);
            $table->boolean('antena_rf')->default(true);
            $table->boolean('antena_gps')->default(true);
            $table->boolean('conexion_electrica')->default(true);
            $table->boolean('sensores_internos')->default(true);
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_faenas');
    }
};
