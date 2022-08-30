  @extends('layouts.smart-hr')
  @section('content')

        <div class="page-wrapper">
            @include('layouts.partials.flash')

            <div class="content container-fluid">

                <div class="card">
                    <div class="col-auto float-right ml-auto mb-3 mt-3">
                        <a href="{{url('users_reports')}}" class="btn add-btn">
                            <em class="fa fa-download"></em> Generate users report </a>
                    </div>

                    <form class="card card-sm" action="{{url('search_box')}}" method="post">
                        @csrf
                        <div class="card-body row no-gutters align-items-center">
                            <!--end of col-->
                            <div class="col">
                                <input name="field" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search by Fullname, Id Numner or Location">
                            </div>
                            <!--end of col-->
                            <div class="col-auto">
                                <button class="btn btn-lg btn-success" type="submit">Search</button>
                            </div>
                            <!--end of col-->
                        </div>
                    </form>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Id Number</th>
                                        <th>Phone Number</th>
                                        <th>County</th>
                                        <th>Subcounty</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                         <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->fullname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->id_number}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->county}}</td>
                                            <td>{{$user->subcounty}}</td>
                                            <td>{{$user->location}}</td>


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
                                                        <a class="dropdown-item" href="{{url('view_user',$user->id)}}"><em
                                                            class="fa fa-eye-slash m-r-5"></em> View
                                                        </a>
                                                        <a class="dropdown-item" href="{{url('user_report',$user->id)}}"><em
                                                             class="fa fa-download m-r-5"></em> Download User Report
                                                        </a>
                                                    @endif

                                                         <form action="{{url('delete_user',$user->id)}}" method="post"
                                                            onsubmit="return confirm('You are about to delete this record. This action is irrevesible and the data cannot be recovered! \nDo you wish to continue?');">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item" href="#">
                                                                <em class="fa fa-trash-o m-r-5"></em> Delete</button>
                                                        </form>
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

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(Session::has('success'))
        <script>
            swal('User successfully deleted','Congratulations','success');
        </script>
        @endif




  @endsection
