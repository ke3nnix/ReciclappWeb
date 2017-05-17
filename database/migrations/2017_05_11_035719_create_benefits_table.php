<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('beneficio_id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('req_puntos')->unsigned();
            $table->string('tipo');
            $table->integer('cantidad');
            $table->integer('sponsor_id')->unsigned();
            $table->integer('estado');
            $table->dateTime('fecha_entrada');
            $table->dateTime('fecha_salida');
            $table->timestamps();

            // FOREIGNS
            $table->foreign('sponsor_id')->references('sponsor_id')->on('sponsors');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefits');
    }
}
