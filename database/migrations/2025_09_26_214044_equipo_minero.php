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
        Schema::create('equipo_minero', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('modelo');
            $table->string('tipo');
            $table->foreignId('faena_id')->constrained('faenas');
            $table->string('uman_serial')->nullable()->unique();
            $table->string('posicion_equipo_uman')->nullable();
            $table->boolean('dcdc')->default(false);
            $table->boolean('puesta_tierra')->default(false);
            $table->decimal('antena_rf_mt')->nullable();
            $table->decimal('antena_gps_mt')->nullable();
            $table->decimal('hmi_mt')->nullable();
            $table->decimal('cable_alimentacion_mt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_minero');
    }
};
