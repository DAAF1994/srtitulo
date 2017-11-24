<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatformGame extends Model
{
    protected $table = 'platformgames';

    public function getGame(){
    	return $this->belongsTo('App\Juego', 'games_id');
    }

    public function getPlatform(){
    	return $this->hasOne('App\Platform', 'platform_id');
    }
}
