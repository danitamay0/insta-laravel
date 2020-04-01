<?php

namespace App\Http\Middleware;

use Closure;
use App\Coment;
use Illuminate\Support\Facades\Auth;
class deleteComent
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
        $coment=Coment::find($request->input('id'));
      if($coment->user->id==Auth::user()->id || $coment->image->user->id){
            return $next($request);
      }else{
          return redirect()->route('image.detail');
      }

       

        
    }
}
