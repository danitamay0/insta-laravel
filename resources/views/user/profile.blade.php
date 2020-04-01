@extends('layouts.app');

@section('content')
<div class="container" >
  <div class="row justify-content-center mb-4 ">
    <div class="col-md-7 d-flex flex-row align-items-center">
          <img class="w-25 ml-5 mr-5 rounded-circle" src="  {{route('user.image',['fileName'=>$user->image])}}" alt="">
      <div class="d-flex flex-column">
            
        <h2 class="h1 text-primary">@ {{$user->nick}}</h2>
      <h2 class="h3 text-secondary"> {{$user->name}} {{$user->lastname}}</h2>    
     </div>
    </div>      
    <div class="col-md-3 d-flex">
        

    </div>      
</div>  
<hr>

<div class="row justify-content-center  " >
    <div class="col-md-10   grid-cont ">
        @foreach($user->images as $image)
        <a href="{{route('image.detail',['id'=>$image->id])}}">
        <div class="d-flex h-100 align-items-center justify-content-center">

            <img class="w-75" src="{{route('image.get',['fileName'=>$image->image_path])}}" alt="">
       
        </div>
        </a>
         @endforeach
    </div>
</div>
</div>

@endsection