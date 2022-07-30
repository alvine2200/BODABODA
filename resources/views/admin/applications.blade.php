@extends('layouts.smart-hr')
@section('content')
    <div class="page-wrapper">
        @include('layouts.partials.flash')
        <div class="mx-auto ">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        {{-- <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index"></a></li>
                            <li class="breadcrumb-item active">Destinations</li>
                        </ul> --}}
                    </div>
                    {{-- <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_accomodation"><em
                                class="fa fa-plus"></em> Add Accommodation</a>
                    </div>  --}}
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="account-wrapper">
                        <p style="font-size:20px!important; font-weight:bold;"
                         class="account-subtitle fw-bold display-2">License Application</p>
                        </p>
                        {{-- <h3 class="account-title">Agents</h3>  --}}
                        {{-- <h3 class="account-title">Register</h3> --}}
                        <p class="float-start">Apply for a License</p>
                        <hr  class="mb-5">
                        <!-- Account Form -->
                        {{-- <form method="POST" action="{{ route('register') }}"> --}}
                        <form method="POST" action="{{url('post_application')}}" id="register_form">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="national_id_copy">{{ __('National Id Copy') }}</label>
                                        <input id="national_id_copy" type="file" class="form-control @error('national_id_copy') is-invalid @enderror"
                                               name="national_id_copy" value="{{ old('national_id_copy') }}" autofocus>

                                        @error('national_id_copy')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="dob">{{ __(' Date Of Birth') }}</label>
                                        <input id="date" type="date" class="form-control @error('dob') is-invalid @enderror"
                                               name="dob" value="{{ old('email') }}" autofocus>
                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="driving_school_certificate">{{ __('Driving School Certificate') }}</label>
                                        <input id="driving_school_certificate" type="file" class="form-control @error('driving_school_certificate') is-invalid @enderror"
                                               name="driving_school_certificate" value="{{ old('driving_school_certificate') }}" autofocus>
                                        @error('driving_school_certificate')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
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
                                    @foreach ($applications as $application)                                     
                                    
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
                                                    <a class="dropdown-item" href="{{url('view_application',$application->id)}}"><em
                                                        class="fa fa-eye-slash m-r-5"></em> View
                                                 </a>
                                                     <a class="dropdown-item" href="{{url('approve_driving_school',$application->id)}}"><em
                                                            class="fa fa-check m-r-5"></em> Approve Driving School Certificate
                                                     </a>
                                                     <a class="dropdown-item" href="{{url('approve_generate_card',$application->id)}}"><em
                                                            class="fa fa-check m-r-5"></em> Approve Generate Card
                                                     </a>
                                                     @endif                                                     
                                                    {{-- <a class="dropdown-item" href="{{url('delete_application',$application->id)}}" data-toggle="modal" data-target="#edit_application" ><em
                                                        class="fa fa-trash-o m-r-5"></em> Delete
                                                    </a>  --}}
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
                                    @endforeach


                                    <div id="#" class="modal custom-modal fade" role="dialog">
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
                                    </div>
                                    

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
