<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='likes';
    function user(){
        return $this->belongsTo('App\User','user_id');
    }

    //many to one
    //muchas likes por un solo image
    function image(){
        return $this->belongsTo('App\Image','image_id');
    }
}
