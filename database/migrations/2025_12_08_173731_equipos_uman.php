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
        Schema::create('equipos_uman', function (Blueprint $table) {
            $table->string('serial')->primary(); // clave primaria string
            $table->foreignId('tecnico_id')->constrained('tecnicos');
            $table->string('estado');
            $table->string('modelo_uman')->nullable();
            $table->foreignId('uman_version_id')->constrained('version_umans');
            $table->foreignId('version_sd_id')->constrained('version_sds');
            $table->foreignId('pcb_uman_id')->constrained('pcb_umans');
            $table->string('rpi_version')->nullable();
            $table->string('ups_version')->nullable();  
            $table->string('pcb_antenna')->nullable();
            $table->string('radiometrix')->nullable();
            $table->boolean('bam')->default(false);
            $table->string('marca_bam')->nullable();
            $table->string('chip')->nullable();
            $table->string('imei_chip')->nullable();
            $table->date('fecha_fabricacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos_uman');
    }
};
