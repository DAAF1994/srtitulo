<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformgameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platformgames', function($table)
        {
            $table->increments('id');
            $table->integer('games_id')->unsigned();
            $table->foreign('games_id')->references('id')->on('games');
            $table->integer('platform_id')->unsigned();
            $table->foreign('platform_id')->references('id')->on('platform');
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
        Schema::drop('platformgames');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
