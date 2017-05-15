<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transfers', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('desecho_id')->unsigned();
          $table->string('descripcion');
          $table->integer('cantidad')->unsigned();
          $table->timestamps();

          // FOREIGNS
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
        Schema::dropIfExists('transfers');
    }
}
