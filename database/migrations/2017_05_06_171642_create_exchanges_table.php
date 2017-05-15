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
            $table->increments('id');
            $table->integer('colaborador_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->integer('acopio_id')->unsigned();
            $table->integer('puntos')->unsigned();
            $table->timestamps();

            // FOREIGNS
            $table->foreign('colaborador_id')->references('id')->on('users');
            $table->foreign('empleado_id')->references('id')->on('users');
            $table->foreign('acopio_id')
                        ->references('id')
                        ->on('collection_points')
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
