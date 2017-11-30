<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $table = 'games';

    public function getGenreGames(){
    	return $this->hasMany('App\GenreGame', 'games_id');
    }

    public function getPlatformGame(){
    	return $this->hasMany('App\PlatformGame', 'games_id');
    }
}

