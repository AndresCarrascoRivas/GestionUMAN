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
        Schema::create('ordenes_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->string('equipo_uman_serial');
            $table->foreign('equipo_uman_serial')->references('serial')->on('equipos_uman');
            $table->foreignId('tecnico_id')->constrained('tecnicos');
            $table->foreignId('faena_id')->constrained('faenas');
            $table->foreignId('equipo_minero_id')->nullable()->constrained('equipo_minero');
            $table->string('estado');
            $table->foreignId('version_sd_id')->constrained('version_sds');
            $table->foreignId('pcb_uman_id')->constrained('pcb_umans');
            $table->string('ups_version')->nullable();
            $table->string('rpi_version')->nullable();
            $table->foreignId('uman_version_id')->constrained('version_umans');
            $table->boolean('bam')->default(false);
            $table->string('marca_bam')->nullable();
            $table->string('chip')->nullable();
            $table->string('imei_chip')->nullable();
            $table->foreignId('falla_id')->constrained('fallas');
            $table->text('descripcion_falla')->nullable();
            $table->text('detalle_reparacion')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_reparacion')->nullable();
            $table->integer('horas_reparacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_laboratorio');
    }
};
