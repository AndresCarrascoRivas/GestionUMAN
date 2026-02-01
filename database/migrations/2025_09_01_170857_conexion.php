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
        Schema::create('conexion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faena_id')->constrained('faenas');
            $table->enum('tipo', ['wifi', 'ethernet', 'bam']);
            $table->string('ip', 45)->nullable();
            $table->string('gateway', 45)->nullable();
            $table->string('netmask', 45)->nullable();
            $table->string('operador', 100)->nullable();
            $table->string('apn', 100)->nullable();
            $table->string('apn_user', 100)->nullable();
            $table->string('apn_pass', 100)->nullable();
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
