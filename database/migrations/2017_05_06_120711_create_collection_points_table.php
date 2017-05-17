<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_points', function (Blueprint $table) {
            $table->increments('acopio_id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('distrito');
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('papel_max')->unsigned();
            $table->integer('papel_actual')->unsigned()->default(0);
            $table->integer('vidrio_max')->unsigned();
            $table->integer('vidrio_actual')->unsigned()->default(0);
            $table->integer('plastico_max')->unsigned();
            $table->integer('plastico_actual')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_points');
    }
}
