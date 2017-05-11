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
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('puntos')->unsigned();
            $table->string('tipo');
            $table->integer('cantidad');
            $table->integer('sponsor_id')->unsigned();
            $table->integer('status');
            $table->timestamps();

            // FOREIGNS
            $table->foreign('sponsor_id')->references('id')->on('sponsors');
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