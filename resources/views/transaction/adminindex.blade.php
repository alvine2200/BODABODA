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
                         class="account-subtitle fw-bold display-2">Mpesa Payment</p>
                        </p>
                        {{-- <h3 class="account-title">Register</h3> --}}
                        <p class="float-start">Pay for License Servicing</p>
                        <hr  class="mb-5">
                        <!-- Account Form -->
                        {{-- <form method="POST" action="{{ route('register') }}"> --}}
                        <form method="POST" action="{{url('stkpush')}}" id="register_form">
                            @csrf
                            <div class="row">

                                <div class="form-group text-center d-grid gap-2 col-6 mx-auto mt-2">
                                    <button type="submit" id="register" class="btn btn-danger col-12">
                                        {{ __('Pay') }}
                                    </button>
                                 </div>

                             </div>
                        </form>
                        <!-- /Account Form -->
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="col-auto float-right ml-auto mb-3 mt-3">
                    <a href="{{url('transaction_report')}}" class="btn add-btn">
                        <em class="fa fa-download"></em> Generate Transaction Report </a>
                </div> 

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Amount</th>
                                    <th>Refference_number</th>
                                    <th>Status</th>
                                    <th>Admin_status</th>
                                    <th>Phone Number</th>
                                    <th>Purpose</th>
                                    <th>Date and Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($transaction as $trans)
                                     <tr>
                                        <td>{{$trans->id ?? 'No trans yet'}}</td>
                                        <td>{{$trans->amount ?? 'No trans yet'}}</td>
                                        <td>{{$trans->referrence_number ?? 'No trans yet'}}</td>
                                        @if ($trans['status'] == 'pending')
                                          <td><span class="badge badge-danger">Pending</span></td>
                                        @else
                                          <td><span class="badge badge-success">Paid</span></td>
                                        @endif

                                        @if ($trans['admin_status'] == '0')
                                            <td><span class="badge badge-danger">Pending</span></td>
                                        @else
                                            <td><span class="badge badge-success">Approved</span></td>
                                        @endif
                                        <td>{{$trans->phone_number ?? 'No trans yet'}}</td>
                                        <td>{{$trans->purpose ?? 'No trans yet'}}</td>
                                        <td>{{$trans->date ?? 'No trans yet'}}</td>

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
                                                       <a class="dropdown-item" href="{{url('approve_transactions',$trans->id)}}" data-toggle="#"><em
                                                            class="fa fa-check m-r-5"></em> Approve
                                                       </a>
                                                     @endif
                                                     {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_application" ><em
                                                        class="fa fa-check m-r-5"></em> Edit
                                                    </a> --}}
                                                     {{-- <a class="dropdown-item" href="{{url('delete_application')}}" data-toggle="#" data-target="#" ><em
                                                        class="fa fa-trash-o m-r-5"></em> Delete
                                                    </a> --}}
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
