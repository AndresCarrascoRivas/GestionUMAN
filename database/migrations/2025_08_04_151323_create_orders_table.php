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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('serialUb');
            $table->foreign('serialUb')->references('serialUb')->on('equipo_ubs')->onDelete('cascade');
            $table->string('estado');
            $table->string('serialPcbUman')->nullable();
            $table->string('serialUps')->nullable();
            $table->string('versionRpi')->nullable();
            $table->string('versionFirmware')->nullable();
            $table->integer('tecnico');
            $table->integer('faena');
            $table->string('falla');
            $table->timestamps();
            $table->date('fechaIngreso');
            $table->date('fechaReparacion')->nullable();
            $table->longText('descripcionFalla')->nullable();
            $table->longText('detalleReparacion')->nullable();
            $table->integer('hReparacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
