@extends('layouts.smart-hr')
@section('content')


<base href="/public">
<div class="page-wrapper">
    @include('layouts.partials.flash')
    <div class="content container-fluid">
        <div class="row">
            <div class="card">
                    <div class="account-wrapper">
                        <p style="font-size:20px!important; font-weight:bold;"
                             class="account-subtitle fw-bold display-2">Forums</p>
                            </p>

                            {{-- <h3 class="account-title">Register</h3> --}}
                            <p class="float-start">Edit a Forum</p>
                            <hr  class="mb-5">
                        <div class="card-body">
                            <form method="POST" action="{{url('forums',$edit->id)}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="topic">{{ __('Topic') }}</label>
                                            <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror"
                                                name="topic" value="{{$edit->topic}}" autofocus>

                                            @error('topic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="subtopic">{{ __('Sub topic') }}</label>
                                            <input id="subtopic" type="text" class="form-control @error('subtopic') is-invalid @enderror"
                                                name="subtopic" value="{{ $edit->subtopic }}" autofocus>

                                            @error('subtopic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="image">{{ __('Image') }}</label>
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" value="{{ old('image') }}" autofocus>
                                            <img style="width:100px; height:70px; margin-top:20px;"  src="images/forum/{{$edit->image}}" class="img-responsive" alt="image">


                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="body">{{ __('Body') }}</label>
                                            <textarea id="body" rows="5" cols="60" type="text" class="form-control @error('body') is-invalid @enderror"
                                                name="body" autofocus>{{ $edit->body }}
                                            </textarea>

                                            @error('body')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group text-center d-grid gap-2 col-6 mx-auto mt-2">
                                    <button type="submit" id="subit_Forums" class="btn btn-danger col-12">
                                        {{ __('Update Post') }}
                                    </button>
                                </div>

                                </div>

                            </form>
                        </div>
                    </div>
                
                
            </div>
        </div>
    </div>
</div>

@endsection
