<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo');
            $table->integer('faltas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('monto_incentivo', 10, 0);
            $table->decimal('monto_viaje', 10, 0);
            $table->decimal('sueldo', 10, 0);
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
        Schema::dropIfExists('contrato');
    }
}
