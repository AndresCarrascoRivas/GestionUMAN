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
        Schema::create('orden_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->string('uman_serial');
            $table->foreignId('tecnico_id')->constrained('tecnicos');
            $table->foreignId('faena_id')->constrained('faenas');
            $table->string('equipo_minero');
            $table->string('estado');
            $table->string('pcb_uman_serial')->nullable();
            $table->string('ups_serial')->nullable();
            $table->string('rpi_version')->nullable();
            $table->string('firmware_version')->nullable();
            $table->string('falla')->nullable();
            $table->text('descripcion_falla')->nullable();
            $table->text('detalle_reparacion')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_reparacion')->nullable();
            $table->string('horas_reparacion')->nullable();
            $table->timestamps();

            $table->foreign('uman_serial')->references('serial')->on('equipos_uman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
