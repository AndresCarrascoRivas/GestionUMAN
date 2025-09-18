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
            $table->string('uman_version')->nullable();
            $table->string('rpi_version')->nullable();
            $table->string('ups_version')->nullable();
            $table->string('pcb_uman')->nullable();
            $table->string('pcb_antenna')->nullable();
            $table->string('radiometrix')->nullable();
            $table->date('fecha_fabricacion')->nullable();
            $table->timestamps();
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
