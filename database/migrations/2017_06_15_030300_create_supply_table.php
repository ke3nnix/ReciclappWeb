<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('supply', function (Blueprint $table) {
            $table->increments('abastecimiento_id');
            $table->integer('beneficio_id')->unsigned();
            $table->integer('cantidad');
            $table->timestamps();
            
            // FOREIGNS
            $table->foreign('beneficio_id')->references('beneficio_id')->on('benefits');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supply');
    }
}
