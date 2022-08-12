  @extends('layouts.smart-hr')
  @section('content')
        
        <div class="page-wrapper">
            @include('layouts.partials.flash')

            <div class="content container-fluid">
                All users here
                <div class="card">
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
                                                        {{-- @if (Auth::user()->is_admin == 1)
                                                         <a class="dropdown-item" href="#"><em
                                                                class="fa fa-trash-o m-r-5"></em> Delete
                                                            </a>
                                                         @endif --}}
                                                         {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user" ><em
                                                            class="fa fa-check m-r-5"></em> Edit
                                                        </a> --}}
                                                         {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_application" >
                                                            <em class="fa fa-trash-o m-r-5"></em> Delete
                                                        </a>   --}}
                                                         <form action="{{url('delete_user',$user->id)}}" method="post"
                                                            onsubmit="return confirm('You are about to delete this record. This action is irrevesible and the data cannot be recovered! \nDo you wish to continue?');">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item" href="#">
                                                                <i class="fa fa-trash-o m-r-5"></i> Delete</button>
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
        @if(Session::has('success'))
        <script>
            swal('User successfully deleted','done','success');
        </script>
        @endif

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  @endsection
