<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo');
            $table->date('fecha_entrega');
            $table->integer('paquete');
            $table->integer('peso_neto');
            $table->integer('cod_corte');
            $table->integer('cod_tipo');
            $table->integer('cod_chata');
            $table->integer('cod_camion');
            $table->integer('cod_trabajador');
            $table->integer('cod_canero');
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
        Schema::dropIfExists('entrega');
    }
}
