<div class="col-md-8 py-4" >
    <div class="card">
        <div class="card-header d-flex flex-grow justify-content-between">
          <a href="{{route('profile',['id'=>$image->user->id])}}" class="d-flex flex-row align-items-center">
            @if(!Storage::disk('users')->exists($image->user->image))
            
                <img class="rounded-circle " style="width:30px" src="{{route('image.get',['fileName'=>'not-available.png'])}}" alt=""> 
             @else
                 <img class="rounded-circle " style="width:30px" src="{{route('user.image',['fileName'=>$image->user->image])}}" alt=""> 
             @endif
            <h3 class="h5 m-0 mx-1">{{  ucfirst($image->user->name) .' ' . ucfirst($image->user->lastname) . '  | '}} </h3>
        
          <h3 class="h5 text-secondary m-0"> {{ ' ' . ' @' . ucfirst($image->user->nick) }}</h3>
          </a>
          @if(Auth::user()->id == $image->user->id)
          <a class="btn btn-info text-white" href="#">
                Edit
          </a>
          @endif
        </div>

        <div class="card-body ">
            <div class="mb-3 d-flex justify-content-center w-100">
                @if(!Storage::disk('images')->exists($image->image_path))
                
                <img class=" w-75 " src="{{route('image.get',['fileName'=>'not-available.png'])}}" alt=""> 
                @else
                    <img class=" w-75   " src="{{route('image.get',['fileName'=>$image->image_path])}}" alt=""> 
                 @endif
            </div>
           <h5 class="text-secondary mb-1 card-title">{{'@ '.$image->user->nick}} | {{ $image->created_at}}</h5>
    
            <p class="card-text mb-0 ml-2">{{$image->description}}</p>
            <div class="m-0  " >
                <?php $userLike= App\Like::where('user_id',\Auth::user()->id)->where('image_id',$image->id)->exists()?>
                <div class="d-flex flex-row align-items-center">
                     @if($userLike)
                        <img class="ml-2 like" style="width:32px" data-id={{$image->id}} src="{{asset('img/red-heart.png')}}" alt="">         
                     @else
                        <img class="dislike" style="width:50px" data-id={{$image->id}} src="{{asset('img/black-heart.png')}}" alt=""> 
                    @endif
                    <h3 class="h6 text-secondary  m-0" >{{count($image->likes)}} </h3>
                </div>
              <a class="btn btn-info " href="{{route('image.detail',['id'=>$image->id])}}" >
                <span class="text-white"> coments ( {{count($image->coments)}} ) </span>
              </a>
            </div>
           
        </div>
    </div>
</div>