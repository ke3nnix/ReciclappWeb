<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('entrega_id');
            $table->integer('colaborador_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->integer('acopio_id')->unsigned();
            $table->integer('total_puntos')->unsigned();
            $table->timestamps();

            // FOREIGNS
            $table->foreign('colaborador_id')->references('usuario_id')->on('users');
            $table->foreign('empleado_id')->references('usuario_id')->on('users');
            $table->foreign('acopio_id')->references('acopio_id')->on('collection_points')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
