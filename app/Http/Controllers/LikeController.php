<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Like;
use App\Image;
class LikeController extends Controller
{
   
    function like($image_id){
       


       $like= new Like();
       $issetLike=$like::where('user_id',\Auth::user()->id)->where('image_id',$image_id)->exists();
      
       if(!$issetLike){
        $like->image_id=$image_id;
        $like->user_id=\Auth::user()->id;        
         
        $like->save();
        return response()->json(['like'=>$like]);
       }else{
           return response()->json(['message'=>'ya existe el like']);
       }
   
    }
    
    function dislike($image_id){
       


      
        $like=Like::where('user_id',\Auth::user()->id)->where('image_id',$image_id)->first();

        if($like){
        
               
        $like->delete();
         return response()->json(['dislike'=>$like,'message'=>'like eliminado']);
        }else{
            return response()->json(['message'=>' el like no existe']);
        }
    
     }

     function allLikes(){
        $likes=Like::where('user_id',\Auth::user()->id)->orderBy('id','desc')->paginate(5);
        
       
        return view('like.allLike',['likes'=>$likes]);
      }
    
}
