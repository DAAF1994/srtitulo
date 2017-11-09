<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGenreGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genregames', function($table)
        {
            $table->increments('id');
            $table->integer('games_id')->unsigned();
            $table->foreign('games_id')->references('id')->on('games');
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genre');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('genregames');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
