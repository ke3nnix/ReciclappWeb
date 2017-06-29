<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldEstadoToCollectionPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collection_points', function (Blueprint $table) {
            $table->integer('estado')->unsigned()->after('longitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collection_points', function (Blueprint $table) {
            $table->dropColumn('estado');
        });        
    }
}
