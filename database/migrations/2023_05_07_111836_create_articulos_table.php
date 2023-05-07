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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('id_codigo_paquete');
            $table->unsignedBigInteger('id_codigo_categoria');

            $table->double('peso', 10, 4);
            $table->unsignedBigInteger('id_tipo_peso');
            
            $table->double('largo', 10, 4);
            $table->double('ancho', 10, 4);
            $table->double('alto', 10, 4);

            $table->double('volumen_kilo', 10, 4)->nullable();
            $table->double('pies_cubicos', 10, 4)->nullable();

            $table->unsignedBigInteger('id_tipo_medida');

            $table->double('cantidad', 10, 4)->nullable();
            $table->text('description')->nullable();
            $table->double('precio', 10, 4)->nullable();

            $table->bigInteger('status');

            $table->timestamps();
            $table->foreign('id_codigo_paquete')->references('id')->on('paquetes')->onDelete('cascade');
            $table->foreign('id_codigo_categoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('id_tipo_peso')->references('id')->on('tipo_peso')->onDelete('cascade');
            $table->foreign('id_tipo_medida')->references('id')->on('tipo_medida')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
