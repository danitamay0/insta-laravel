@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 ">
              
               <div class="card" >
                    <div class="card-header h3 text-md-center" >
                     {{ __('Upload a Photo')  }}
                     </div>    
                     <div class="card-body justify-content-center" >
                     <form method="POST" action="{{route('image.upload')}}" enctype="multipart/form-data" >
                            @csrf
                            {{csrf_field()}}

                           
                            

                            <div class="form-group row  " >
                                <label class="col-md-4 col-form-label text-md-right" for="image">{{__('Upload a Photo')}}</label>
                                
                                <div class="col-md-6 d-flex flex-column-reverse ">
                                  
                                    <input id="image_path" type="file" class="form-control-file form-control @error('image_path') is-invalid @enderror" name="image_path"   autocomplete="image_path" autofocus>

                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                            
                            </div>

                            <div class="form-group row" >
                                <label class="col-md-4 col-form-label text-md-right" for="description">{{__('Description')}}</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"   required autocomplete="name" autofocus>

                                    @error('description')
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