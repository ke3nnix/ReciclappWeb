<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('usuario_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('tipo');
            $table->string('dni');
            $table->integer('estado');
            $table->integer('puntos')->unsigned();
            $table->string('imagen')->nullable();
            $table->string('direccion')->nullable();
            $table->string('distrito')->nullable();
            $table->date('nacimiento')->nullable();
            $table->string('api_token', 60)->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
