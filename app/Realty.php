<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realty extends Model
{
    //
    public function comments(){
    	return $this->hasMany('App\Comment','post_id','id');
    }
}
