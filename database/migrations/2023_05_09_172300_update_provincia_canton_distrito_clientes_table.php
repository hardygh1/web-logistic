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
        Schema::table('clientes', function ($table) {
            $table->dropColumn('distrito');
            $table->unsignedBigInteger('id_provincia')->nullable();
            $table->unsignedBigInteger('id_canton')->nullable();
            $table->unsignedBigInteger('id_distrito')->nullable();
            $table->text('codigo_postal')->nullable();
           
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
