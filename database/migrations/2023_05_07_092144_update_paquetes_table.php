<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('paquetes', function ($table) {
            $table->dropColumn('tipo_transporte');
            $table->unsignedBigInteger('id_tipo_transporte');
            $table->foreign('id_tipo_transporte')->references('id')->on('transportes')->onDelete('cascade');
        });

        DB::statement("ALTER TABLE paquetes AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
    }
};
