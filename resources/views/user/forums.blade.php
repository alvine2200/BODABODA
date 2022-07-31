@extends('layouts.smart-hr')
@section('content')
    <div class="page-wrapper">
        @include('layouts.partials.flash')

        <div class="content container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="account-wrapper">
                            <p style="font-size:20px!important; font-weight:bold;"
                             class="account-subtitle fw-bold display-2">Forums</p>
                            </p>  

                            {{-- <h3 class="account-title">Register</h3> --}}
                            <p class="float-start">Create a Forum</p>
                            <hr  class="mb-5">
                            <!-- Account Form -->
                            {{-- <form method="POST" action="{{ route('register') }}"> --}}
                            <form method="POST" action="{{url('forums')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="topic">{{ __('Topic') }}</label>
                                            <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror"
                                                   name="topic" value="{{ old('topic') }}" autofocus>

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
                                                   name="subtopic" value="{{ old('subtopic') }}" autofocus>

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
                                                   name="body" value="{{ old('body') }}" autofocus>
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
                                         {{ __('Send Post') }}
                                    </button>
                                </div>

                                 </div>



                            </form>
                            <!-- /Account Form -->
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Topic</th>
                                        <th>Sub Topic</th>
                                        <th>Image</th>
                                        <th>Body</th>
                                        <th>Time Posted</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @if(Auth::user()->is_admin ==true)
                                    @foreach ($forums as $forum)

                                         <tr>

                                            <td>{{$forum->id}}</td>
                                            <td>{{$forum->topic}}</td>
                                            <td>{{$forum->subtopic}}</td>
                                            <td>{{$forum->image}}</td>
                                            <td>{{$forum->body}}</td>
                                            <td>{{$forum->time}}</td>
                                            <td>{{$forum->status}}</td>

                                            <td class="">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                        aria-expanded="false"><em class="material-icons">more_vert</em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if (Auth::user()->is_admin == 1)
                                                         <a class="dropdown-item" href="{{url('approve_forum',$forum->id)}}">
                                                            <em class="fa fa-check m-r-5" ></em> Approve
                                                         </a>                                                       
                                                          <a class="dropdown-item" href="{{url('edit_forums',$forum->id)}}">
                                                            <em class="fa fa-check m-r-5"></em> Edit
                                                          </a> 
                                                          <a class="dropdown-item" href="{{url('forums_delete',$forum->id)}}" onsubmit="return confirm('You are about to delete this record. This action is irrevesible and the data cannot be recovered! \nDo you wish to continue?');" >
                                                             <em class="fa fa-trash-o m-r-5"></em> Delete
                                                          </a> 
                                                        @endif                                                                                                          
                                                       
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                 @foreach ($forum_user as $fo)
                                        <tr>                                  
                                            <td>{{$fo->id }}</td>
                                            <td>{{$fo->topic }}</td>
                                            <td>{{$fo->subtopic }}</td>
                                            <td>{{$fo->image }}</td>
                                            <td>{{$fo->body }}</td>
                                            <td>{{$fo->time }}</td>
                                            <td>{{$fo->status }}</td>
                                            <td>
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                        aria-expanded="false"><em class="material-icons">more_vert</em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">                                               
                                                        @if (Auth::user()->is_admin == 1)
                                                         <a class="dropdown-item" href="{{url('approve_forum',$forum->id)}}">
                                                            <em class="fa fa-check m-r-5" ></em> Approve
                                                         </a>
                                                         @endif                                                       
                                                        
                                                          <a class="dropdown-item" href="{{url('edit_forums',$fo->id)}}">
                                                            <em class="fa fa-pencil m-r-5"></em> Edit
                                                          </a> 
                                                          <a class="dropdown-item" href="{{url('forums_delete',$fo->id)}}" onsubmit="return confirm('You are about to delete this record. This action is irrevesible and the data cannot be recovered! \nDo you wish to continue?');" >
                                                             <em class="fa fa-trash-o m-r-5"></em> Delete
                                                          </a> 
                                                    </div>
                                                </div>
                                            </td>                                       
                                        </tr>
                                     @endforeach                               
                                    

                                  @endif
                                      

                                        @if (Auth::user()->is_admin ==true)
                                          <div id="edit_forum" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Forum</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form method="POST" action="{{url('forums',$forum->id)}}" method="POST" enctype="multipart/form-data" >
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                            
                                                                <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label for="topic">{{ __('Topic') }}</label>
                                                                        <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror"
                                                                               name="topic" value="{{$forum->topic}}" autofocus>
                            
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
                                                                               name="subtopic" value="{{ $forum->subtopic }}" autofocus>
                            
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
                                                                        <img style="width:100px; height:70px; margin-top:20px;"  src="images/forum/{{$forum->image}}" class="img-responsive" alt="image">
                                                                       
                            
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
                                                                               name="body" autofocus>{{ $forum->body }}
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
                                                                     {{ __('Edit Post') }}
                                                                </button>
                                                            </div>
                            
                                                             </div>
                            
                            
                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>  
                                        @endif 

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
