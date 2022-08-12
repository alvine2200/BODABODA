@extends('layouts.smart-hr')
@section('content')
    <div class="page-wrapper">
        @include('layouts.partials.flash')

        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div style="background-color: #eee;">
                                <div class="container py-5">
                                  <div class="row">
                                    <div class="col">
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-4">
                                      <div class="card mb-4">
                                        <div class="card-body text-center">
                                          <img src="User/profiles/{{$user_id->avatar}}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;">
                                          <h5 class="my-3">{{$user_id->fullname}}</h5>
                                          <p class="text-muted mb-1">@if(!Auth::user()->is_admin)
                                            Rider @else Admin @endif
                                          </p>
                                          <p class="text-muted mb-4">{{$user_id->county}},{{$user_id->location}},{{$user_id->village}}</p>

                                        </div>
                                      </div>
                                      <div class="card mb-4 mb-lg-0">
                                        <div class="card-body p-0">
                                          <ul class="list-group list-group-flush rounded-3">
                                            <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                              <p class=" btn btn-danger mb-0"  data-toggle="modal" data-target="#add_avatar">Add Avatar</p>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                                <p class=" btn btn-danger mb-0" data-toggle="modal" data-target="#edit_profile">Edit Profile</p>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                                <p class=" btn btn-danger mb-0" data-toggle="modal" data-target="#change_password">Change Password</p>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                                <a class="btn btn-primary" href="{{ url('license',$user_id->id)}}"> Download License</a>
                                            </li>

                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-8">
                                      <div class="card mb-4">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <p class="text-muted mb-0">{{$user_id->fullname}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">UserName</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <p class="text-muted mb-0">{{$user_id->username}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">National ID</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <p class="text-muted mb-0">{{$user_id->id_number}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <p class="text-muted mb-0">{{$user_id->email}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <p class="text-muted mb-0">{{$user_id->phone}}</p>
                                            </div>
                                          </div>
                                          <hr>

                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Address(County to Village)</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <p class="text-muted mb-0">{{$user_id->county}},{{$user_id->subcounty}},{{$user_id->district}},{{$user_id->location}},{{$user_id->village}}</p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    </div>                                    
                                  </div>
                                </div>
                              </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Edit Avatar --}}
    <div id="edit_profile" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('edit_profile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">FullName </label>
                            <input class="form-control" value="{{$user_id->fullname}}"
                                 type="text" name="fullname">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Username </label>
                            <input class="form-control" value="{{$user_id->username}}"
                                 type="text" name="username">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input class="form-control " value="{{$user_id->email}}"
                             type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">ID Number</label>
                            <input class="form-control "  value="{{$user_id->id_number}}"
                             type="number" name="id_number">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Phone Number</label>
                            <input class="form-control " value="{{$user_id->phone}}"
                                 type="number" name="phone">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">County </label>
                            <input class="form-control" value="{{$user_id->county}}"
                                 type="text" name="county">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Sub County</label>
                            <input class="form-control"  value="{{$user_id->subcounty}}"
                             type="text" name="subcounty">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">District</label>
                            <input class="form-control " value="{{$user_id->district}}"
                                 type="text" name="district">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Location</label>
                            <input class="form-control"  value="{{$user_id->location}}"
                             type="text" name="location">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Village</label>
                            <input class="form-control " value="{{$user_id->village}}"
                                 type="text" name="village">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Avatar </label>
                            <input class="form-control " type="file" name="avatar">
                            <img class="img-responsive" style="width:150px; height:150px;" src="User/profiles/{{$user_id->avatar}}" alt="image">
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn col-12">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Add avatar --}}
    <div id="add_avatar" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Profile</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('add_avatar')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Avatar <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" required type="file" name="avatar">
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn col-12">Upload Profile Picture</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- change password --}}
    <div id="change_password" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('change_password')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Password <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" required type="text" name="password">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password_Password <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" required type="text" name="password_confirmation">
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn col-12">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
