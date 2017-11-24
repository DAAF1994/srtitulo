<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valoracion extends Model
{
    protected $table = 'valoracion';

    public function getGame(){
    	return $this->belongsTo('App\Juego', 'games_id');
    }
}
