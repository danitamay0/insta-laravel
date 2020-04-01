<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    
    protected $table='coments';
   //many to one
    //muchas comentarios por un solo usuario
    function user(){
        return $this->belongsTo('App\User','user_id');
    }

    //many to one
    //muchas comentarios por un solo image
    function image(){
        return $this->belongsTo('App\Image','image_id');
    }
}
