<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Image;
class myImage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $image=Image::find($request->id);
        if(Auth::user()->id==$image->user->id){
            return $next($request);
        }
        return redirect('/');
     
    }
}
