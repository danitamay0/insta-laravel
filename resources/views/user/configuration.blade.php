@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 ">
                @if(session('message'))
                    <div class="alert alert-success " role='alert'>

                        {{session('message')}}
                    </div>
                
                @endif
               <div class="card" >
                    <div class="card-header h3 text-md-center" >
                     {{ __('Configuration')  }}
                     </div>    
                     <div class="card-body justify-content-center" >
                     <form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data" >
                            @csrf
                            {{csrf_field()}}

                            <div class="form-group row" >
                                <label class="col-md-4 col-form-label text-md-right" for="name">{{__('Name')}}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                            </div>    
                            <div class="form-group row" >    
                                <label class="col-md-4 col-form-label text-md-right" for="lastname">{{__('LastName')}}</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                            </div>
                            <div class="form-group row" >   
                                <label class="col-md-4 col-form-label text-md-right" for="nick">{{__('Nick')}}</label>
                                <div class="col-md-6">
                                    <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ Auth::user()->nick }}"  autocomplete="nick" autofocus>

                                    @error('nick')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                            
                            </div>
                            <div class="form-group row" >   
                                <label class="col-md-4 col-form-label text-md-right" for="email">{{__('Email')}}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                            
                            </div>

                            <div class="form-group row  " >
                                <label class="col-md-4 col-form-label text-md-right" for="image">{{__('Photo Profile')}}</label>
                                
                                <div class="col-md-6 d-flex flex-column-reverse ">
                                    @if(Auth::user()->image)   
                                
                                    
                                      <img class="w-25 p-2" src="{{route('user.image',['fileName'=>Auth::user()->image])}}" alt="">
                                  
                                     @endif
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"   autocomplete="image" autofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                            
                            </div>
                             <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                     </div>
                </div>    
            </div>
        </div>    
    
    </div>   
@endsection