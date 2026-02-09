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
        Schema::create('orden_faena', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tecnico_id')->constrained('tecnicos');
            $table->foreignId('faena_id')->constrained('faenas');
            $table->date('fecha_trabajo');
            $table->foreignId('equipo_minero_id')->constrained('equipo_minero');
            $table->string('estado');
            $table->string('uman_serial');
            $table->boolean('cambio_uman')->default(false);
            $table->string('serial_nueva_uman')->nullable();
            $table->foreignId('falla_id')->constrained('fallas')->nullable();
            $table->text('descripcion_falla')->nullable();
            $table->string('trabajo_realizado')->nullable();
            $table->text('descripcion_trabajo')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('uman_serial')->references('serial')->on('equipos_uman');
            $table->foreign('serial_nueva_uman')->references('serial')->on('equipos_uman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_faena');
    }
};
