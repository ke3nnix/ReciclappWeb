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
            $table->increments('usuario_beneficio_id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('beneficio_id')->unsigned();
            $table->timestamps();

            // FOREIGNS
            $table->foreign('usuario_id')->references('usuario_id')->on('users');
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
        Schema::dropIfExists('user_benefits');
    }
}
