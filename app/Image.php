<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table ='images';
    //one to many 
    //una imagen puede tener muchos comentarios
    
    function coments(){//todos los comentarios cuyo imagen id= comennt image_id
        return $this->hasMany('App\Coment')->orderBy('id','desc');
    }
    
      //one to many 
    //una imagen puede tener muchos likes
    function likes(){
        return $this->hasMany('App\Like');
    }
  //many to one
    //muchas imagenes por un solo usuario
    function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
