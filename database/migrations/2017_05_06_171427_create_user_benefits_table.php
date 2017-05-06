<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_benefits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('colaborador_id')->unsigned();
            $table->integer('beneficio_id')->unsigned();
            $table->timestamps();

            // FOREIGNS
            $table->foreign('colaborador_id')->references('id')->on('users');
            $table->foreign('beneficio_id')->references('id')->on('benefits');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_benefits');
    }
}
