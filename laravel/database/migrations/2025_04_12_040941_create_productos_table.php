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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('description');
            $table->boolean('active')->default(false);
            $table->string('stock');
            $table->string('sku');
            $table->unsignedBigInteger('price_record_id');
            $table->unsignedBigInteger('prod_type_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();
/*
            $table->foreign('brand_id')->references('id')->on('marcas')->comment('Establece relaciones entre ID y tabla Marcas');
            $table->foreign('prod_type_id')->references('id')->on('tipo_productos')->comment('Establece relaciones entre ID y tabla Tipo_Productos');
            $table->foreign('price_record_id')->references('id')->on('precio_historicos')->comment('Establece relaciones entre ID y tabla Precio_Historicos');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
