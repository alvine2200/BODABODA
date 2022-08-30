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
                                    <th>Application number</th>
                                    <th>Transaction status</th>
                                    <th>Driving School Status</th>
                                    <th>Generate card status</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($application)
                                     <tr>
                                        <td>{{$application->application_number}}</td>
                                        <td>{{$application->transaction_status}}</td>
                                        <td>{{$application->driving_school_status}}</td>
                                        <td>{{$application->generate_card}}</td>
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

                                                     <a class="dropdown-item" href="{{url('delete_application',$application->id)}}" data-toggle="#" data-target="#" ><em
                                                        class="fa fa-trash-o m-r-5"></em> Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

