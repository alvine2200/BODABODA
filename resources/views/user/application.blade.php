@extends('layouts.smart-hr')
@section('content')
    <div class="page-wrapper">
        @include('layouts.partials.flash')
        <div class="mx-auto ">
            <div class="page-header">                
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="account-wrapper">
                        <p style="font-size:20px!important; font-weight:bold;"
                         class="account-subtitle fw-bold display-2">License Application</p>
                        </p>

                        {{-- <h3 class="account-title">Register</h3> --}}
                        <p class="float-start">Apply for a License</p>
                        <hr  class="mb-5">
                        <!-- Account Form -->
                        {{-- <form method="POST" action="{{ route('register') }}"> --}}
                        <form method="POST" action="{{url('post_application')}}" id="register_form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="national_id_copy">{{ __('National Id Copy') }}</label>
                                        <input id="national_id_copy" type="file" class="form-control" name="national_id_copy"
                                         value="{{ old('national_id_copy') }}" autofocus>                                                                                
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="dob">{{ __(' Date Of Birth') }}</label>
                                        <input id="date" type="date" class="form-control" name="dob"
                                         value="{{ old('email') }}" autofocus>                                        
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="driving_school_certificate">{{ __('Driving School Certificate') }}</label>
                                        <input id="driving_school_certificate" type="file" class="form-control" name="driving_school_certificate"
                                         value="{{ old('driving_school_certificate') }}" autofocus>
                                       
                                        
                                
                                    </div>
                                </div>

                                </div>

                                <div class="form-group text-center d-grid gap-2 col-6 mx-auto mt-2">
                                    <button type="submit" id="register" class="btn btn-danger col-12">
                                        {{ __('Apply') }}
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
                                    <th>Application number</th>
                                    <th>Driving School Status</th>
                                    <th>Generate card status</th>
                                    <th>dob</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($application)
                                     <tr>

                                        <td>{{$application->id}}</td>
                                        <td>{{$application->application_number}}</td>
                                        <td>{{$application->driving_school_status}}</td>
                                        <td>{{$application->generate_card}}</td>
                                        <td>{{$application->dob}}</td>

                                        {{-- @if ($item->status == 0)
                                            <td><span class="badge badge-danger">Unapproved</span></td>
                                        @else
                                            <td><span class="badge badge-success">Approved</span></td>
                                        @endif --}}



                                        <td class="">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><em class="material-icons">more_vert</em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if (Auth::user()->is_admin == 1)
                                                       <a class="dropdown-item" href="#"><em
                                                            class="fa fa-check m-r-5"></em> Approve
                                                       </a>
                                                     @endif
                                                     {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_application" ><em
                                                        class="fa fa-check m-r-5"></em> Edit
                                                    </a> --}}
                                                     <a class="dropdown-item" href="{{url('delete_application',$application->id)}}" data-toggle="#" data-target="#" ><em
                                                        class="fa fa-trash-o m-r-5"></em> Delete
                                                    </a>
                                                    {{-- <form action="/delete_application',$application->id" method="post"
                                                        onsubmit="return confirm('You are about to delete this record. This action is irrevesible and the data cannot be recovered! \nDo you wish to continue?');">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item" href="#">
                                                            <em class="fa fa-trash-o m-r-5"></em> Delete</button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                    {{-- <div id="#" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Agent</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="#"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control value="#" required type="text"
                                                                name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control @error('email') is-invalid @enderror"
                                                                value="#" required type="text"
                                                                name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control @error('email') is-invalid @enderror"
                                                                value="#" required type="text"
                                                                name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control @error('email') is-invalid @enderror"
                                                                value="#" required type="text"
                                                                name="name">
                                                        </div>
                                                        <div class="submit-section">
                                                            <button class="btn btn-primary submit-btn col-12">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
{{-- @section('javascript')
    <script>
        $(document).ready(function() {
            $("#register").on('click', function() {
                var password = $("#password").val(),
                    confirm_password = $("#password_confirmation").val();
                if (password !== confirm_password) {
                    alert('passwords must be similar');
                    return;
                }
            });
        });
    </script>
@endsection --}}
