@extends('layouts.app')

@section('content')
<div class="container">
    
         
        @if(session('message'))
        <div class="row justify-content-center">
            <div class="col-md-8 py-0" >
                <div class="alert alert-success " role='alert'>

                    {{session('message')}}
                </div> 
            </div>
         </div>
    @endif
 
    <div class="row justify-content-center">
        @if($image)
           
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
                           <h5 class="text-secondary mb-1 card-title">{{'@ '.$image->user->nick}}</h5>
                            <p class="card-text mb-0 ml-2">{{$image->description}}</p>
                            <div class="m-0" >
                                <?php $userLike= App\Like::where('user_id',\Auth::user()->id)->where('image_id',$image->id)->exists()?>
                                <div class="d-flex flex-row align-items-center">
                                     @if($userLike)
                                        <img class="ml-2 like" style="width:32px" data-id={{$image->id}} src="{{asset('img/red-heart.png')}}" alt="">         
                                     @else
                                        <img class="dislike" style="width:50px" data-id={{$image->id}} src="{{asset('img/black-heart.png')}}" alt=""> 
                                    @endif
                                    <h3 class="h6 text-secondary  m-0" >{{count($image->likes)}} </h3>
                                </div>
                              
                            </div>
                            <h3 class="h3s " >
                                <span class="text-secondary"> coments ( {{count($image->coments)}} ) </span>
                            </h3>


                            <form   method="POST" action="{{route('coment.store')}}">
                                @csrf
                               
                                    <input type="text" required class="form-control col-md-12 h-25 py-3 mb-3" placeholder="Insert Your Comment" name="coment" id="">
                               
                            <input type="hidden"  name="image_id" value="{{$image->id}}">
                            
                              
                                <div class="form-group">
                                    <button class="btn btn-success text-white  " type="submit">
                                        Comentar
                                    </button>
                                </div>
                            </form>
                            
                            <div class="row">
                                @foreach ( $image->coments  as $coment)
                                    <div class="col-md-8 d-flex flex-column my-2">
                                        <h3 class="h5 text-secondary my-0">@ {{$coment->user->nick}}</h3>
                                        <h3 class="h5">{{$coment->content}}</h3>
                                    
                                    </div>  
                                    @if($coment->user->id==Auth::user()->id || $image->user->id == Auth::user()->id) 
                                    <div class="col-md-4 ">
                                    <form action="{{route('coment.delete')}}" method="POST">
                                            @csrf 
                                             <input type="hidden" name="_method" value="DELETE">
                                             <input type="hidden" name="id" value="{{$coment->id}}">
                                             <button class="btn btn-danger float-right" type="submit">Delete</a>
                                        </form>
                                       
                                    
                                    </div>     
                                    @endif
                                @endforeach

                        </div>
                        </div>
                    </div>
                </div>  
         
        @endif
        
        
    </div>
</div>
@endsection
