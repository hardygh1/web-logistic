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
        Schema::create('distritos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cod_postal');

            $table->foreignId('id_canton')
                ->constrained('cantones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distritos');
    }
};
