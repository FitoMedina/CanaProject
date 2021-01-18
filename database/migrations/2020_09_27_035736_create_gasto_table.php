<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo');
            $table->integer('interes');
            $table->integer('monto');
            $table->integer('motivo');
            $table->integer('cod_vehiculo');
            $table->integer('cod_lote');
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
        Schema::dropIfExists('gasto');
    }
}
