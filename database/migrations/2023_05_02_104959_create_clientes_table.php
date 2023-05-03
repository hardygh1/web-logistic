<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('identificacion', 20)->unique();
        $table->string('nombre', 50)->notNullable();
        $table->string('apellido', 50)->notNullable();
        $table->string('correo', 100)->notNullable();
        $table->string('nro_celular', 20)->nullable();
        $table->string('nro_casa', 20)->nullable();
        $table->string('nro_oficina', 20)->nullable();
        $table->foreignId('id_distrito')->constrained('distritos');
        $table->string('direccion_1', 100)->notNullable();
        $table->string('direccion_2', 100)->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
