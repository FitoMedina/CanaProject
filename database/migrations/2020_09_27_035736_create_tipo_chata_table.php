<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoChataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_chata', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo');
            $table->string('descripcion');
            $table->string('rodamientogrande');
            $table->string('rodamientopeque');
            $table->string('reten');
            $table->string('detallerodagrande');
            $table->string('detallerodapeque');
            $table->string('detalleretenpeque');
            $table->string('detalleretengrande');
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
        Schema::dropIfExists('tipo_chata');
    }
}
