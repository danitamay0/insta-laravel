<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Image;
class ImageController extends Controller
{
   function upload(){
     
       return view('image.upload');
   }

   function save(Request $req){
    
    
    $validation=$this->validate($req,['image_path'=>'required|mimes:jpeg,bmp,png',
                    'description'=>'required'
    ]);
    $imageReq=$req->image_path;
    $description=$req->input('description');

    $image=new Image();
    $image->user_id=\Auth::user()->id;
    $image->description=$description;

    if($imageReq){
        $imageName= time() . $imageReq->getClientOriginalName();

        Storage::disk('images')->put($imageName,File::get($imageReq));
        $image->image_path=$imageName;

        /**$imageName= time() . $image->getClientOriginalName();
        //actualizar en el disco (storage)  -- Nombre de archivo y el archivo
        Storage::disk('users')->put($imageName,File::get( $image));
        $user->image=$imageName; */
    }
    $image->save();

    return redirect()->route('home')->with(['message'=>'photo upload successfull']);
    
    }
    function getImage($fileName){
       
           $file= Storage::disk('images')->get($fileName);
          return response($file,200);
    
      
        
    }

    function imageDetail($id){
        $image=Image::find($id);
        return view('image.detail',['image'=>$image]);
    }
}
