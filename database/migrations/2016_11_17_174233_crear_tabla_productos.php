<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('categoria_id')->references('id')->on('categorias');
            $table->integer('subcategoria_id')->references('id')->on('subcategorias');
            $table->string('ruta_imagen');
            $table->date('fecha_inicio');
            $table->date('fecha_cierre');
            $table->text('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Productos');
    }
}
