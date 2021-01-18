<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo');
            $table->string('descripcion');
            $table->string('variedad');
            $table->string('edad');
            $table->integer('cod_propiedad');
            $table->date('fecha_proceso');
            $table->date('fecha_hasta');
            $table->char('indicador', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lote');
    }
}
