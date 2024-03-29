@extends('layouts.smart-hr')
@section('content')
    <div class="page-wrapper">
        @include('layouts.partials.flash')
        <div class="mx-auto ">
            <div class="page-header">
                <div class="row align-items-center">
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="account-wrapper">
                        <p style="font-size:20px!important; font-weight:bold;"
                         class="account-subtitle fw-bold display-2">License Application</p>
                        </p>
                        
                        <p class="float-start">Apply for a License</p>
                        <hr  class="mb-5">
                       
                        <form method="POST" action="{{url('post_application')}}" id="register_form">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="national_id_copy">{{ __('National Id Copy') }}</label>
                                        <input id="national_id_copy" type="file" class="form-control"
                                               name="national_id_copy" value="{{ old('national_id_copy') }}" autofocus>

                                        </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="dob">{{ __(' Date Of Birth') }}</label>
                                        <input id="date" type="date" class="form-control"
                                               name="dob" value="{{ old('email') }}" autofocus>
                                       
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="driving_school_certificate">{{ __('Driving School Certificate') }}</label>
                                        <input id="driving_school_certificate" type="file" class="form-control"
                                               name="driving_school_certificate" value="{{ old('driving_school_certificate') }}" autofocus>
                                        
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
                                    <th>Application number</th>
                                    <th>Driving School Status</th>
                                    <th>Transaction status</th>
                                    <th>Generate card status</th>
                                    <th>dob</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($applications as $application)

                                     <tr>
                                        <td>{{$application->application_number}}</td>

                                        @if ($application->driving_school_status == 'pending')
                                          <td><span class="badge badge-danger">Pending</span></td>
                                        @else
                                          <td><span class="badge badge-success">Pass</span></td>
                                        @endif

                                        @if ($application->transaction_status == 'pending')
                                          <td><span class="badge badge-danger">Pending</span></td>
                                        @else
                                          <td><span class="badge badge-success">Approved</span></td>
                                        @endif

                                        @if ($application->generate_card == 'pending')
                                          <td><span class="badge badge-danger">Pending</span></td>
                                        @else
                                          <td><span class="badge badge-success">Yes</span></td>
                                        @endif
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
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

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
