<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coment;
use Illuminate\Support\Facades\Auth;
class ComentController extends Controller
{
    function store(Request $request){
        $coment=new Coment();
        $coment->content= $request->input('coment');
        $coment->image_id=$request->input('image_id');
        $coment->user_id=Auth::user()->id;

        $coment->save();

    return    redirect()->route('image.detail',['id'=>$coment->image_id])->with(['message'=>'Comentario Creado']);

    }

    function delete(Request $req){
        $coment=Coment::find($req->input('id'));
       
        $coment->delete();
        return redirect()->route('image.detail',['id'=>$coment->image->id])->with(['message'=>'Comentario Eliminado']);
    }

}
