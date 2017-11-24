<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreGame extends Model
{
    protected $table = 'genregames';

    public function getGame(){
    	return $this->belongsTo('App\Juego', 'games_id');
    }

    public function getGenre(){
    	return $this->belongsTo('App\genre', 'genre_id');
    }
}
