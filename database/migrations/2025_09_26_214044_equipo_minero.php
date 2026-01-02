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
            $table->unsignedBigInteger('faena_id')->nullable();
            $table->integer('antena_rf')->nullable();
            $table->integer('antena_gps')->nullable();
            $table->foreign('faena_id')->references('id')->on('faenas')->onDelete('set null');
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
