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
        @if($images)
            @foreach ( $images as $image )
                @include('include.imageCard')
            @endforeach
           <div class="col-md-8">
                {{$images->links()}}
           </div>
        @endif
        
        
    </div>
</div>
@endsection
