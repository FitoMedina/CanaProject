<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo');
            $table->string('color');
            $table->string('marca');
            $table->integer('modelo');
            $table->string('placa');
            $table->string('tipo');
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
        Schema::dropIfExists('vehiculo');
    }
}
