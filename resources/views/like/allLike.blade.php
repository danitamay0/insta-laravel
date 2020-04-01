@extends('layouts.app')

@section('content')
<div class="container">
    
         
    @if(session('message'))
    <div class="row justify-content-center">
        <div class="col-md-8 py-4" >
            <div class="alert alert-success " role='alert'>

                {{session('message')}}
            </div> 
        </div>
     </div>
@endif

<div class="row justify-content-center">
    @if($likes)
        @foreach ( $likes as $like )
            @include('include.imageCard',['image'=>$like->image])
        @endforeach
       <div class="col-md-8">
            {{$likes->links()}}
       </div>
    @endif
    
    
</div>
</div>
@endsection