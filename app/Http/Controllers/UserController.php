<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ConfigurationRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
class UserController extends Controller
{
    function configuration(){
        return view('user.configuration');

    }

    function update(ConfigurationRequest $req){
        
      
       $user=\Auth::user();
    
        
        $name=$req->input('name');
       $lastname=$req->input('lastname');
       $email=$req->input('email');
       $nick=$req->input('nick');

       $image= $req->image;
       
       if($image){

        $imageName= time() . $image->getClientOriginalName();
        //actualizar en el disco (storage)  -- Nombre de archivo y el archivo
        Storage::disk('users')->put($imageName,File::get( $image));
        $user->image=$imageName;
       }
       
       $user->name=$name;
       $user->lastname=$lastname;
       $user->$email;
       $user->nick=$nick;
       $user->update();
       return redirect()->route('configuration')->with(['message'=>'Update success']);
    }

    function getImage($fileName){
        $file= Storage::disk('users')->get($fileName);
        return new Response($file,200);
    }

    function profile($id){
        $user=User::find($id);
        
       return view('user.profile',['user'=>$user]);
    }
}
