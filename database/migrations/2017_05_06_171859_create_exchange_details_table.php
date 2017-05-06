<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entrega_id')->unsigned();
            $table->integer('desecho_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->integer('puntos')->unsigned();
            $table->timestamps();

            // FOREIGNS
            $table->foreign('entrega_id')->references('id')->on('exchanges');
            $table->foreign('desecho_id')->references('id')->on('waste');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_details');
    }
}
