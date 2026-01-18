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
        Schema::table('ordenes_laboratorio', function (Blueprint $table) {
        $table->foreignId('version_sd_id')
                ->nullable() 
                ->after('rpi_version')
                ->constrained('version_sds');
    });
    }


    public function down(): void
    {
        Schema::table('ordenes_laboratorio', function (Blueprint $table) {
            $table->dropForeign(['version_sd_id']);
        $table->dropColumn('version_sd_id');
        });
    }
};
