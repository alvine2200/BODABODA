@extends('layouts.smart-hr', ['title'=>'Dashboard'])
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{Auth::user()->username}}</h3>
                        </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget " >
                        <div class="card-body">
                            <span class="dash-widget-icon"><em class="fa fa-briefcase"></em></span>
                            <div class="dash-widget-info">
                                <span>
                                    @if (Auth::user()->is_admin==true)
                                    <h3>{{$transactions->count()}}</h3>
                                    @else
                                    <h3>{{$user_transactions->count()}}</h3>
                                    @endif Transactions
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget ">
                        <div class="card-body">
                            <span class="dash-widget-icon"><em class="fa fa-inbox"></em></span>
                            <div class="dash-widget-info">
                                <span>
                                    @if (Auth::user()->is_admin==true)
                                    <h3>{{$application->count()}}</h3>
                                    @else
                                    <h3>{{$user_application->count()}}</h3>
                                    @endif Applications
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->is_admin==true)
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><em class="la la-user"></em></span>
                            <div class="dash-widget-info">

                                <span>

                                    <h3>{{$users->count()}}</h3>
                                        Users
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><em class="fa fa-question"></em></span>
                            <div class="dash-widget-info">
                                <span>
                                    @if (Auth::user()->is_admin==true)
                                    <h3>{{$queries->count()}}</h3>
                                    @else
                                    <h3>{{$user_queries->count()}}</h3>
                                    @endif Queries
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><em class="fa fa-book"></em></span>
                            <div class="dash-widget-info">
                                <span>
                                    @if (Auth::user()->is_admin==true)
                                    <h3>{{$forums->count()}}</h3>
                                    @else
                                    <h3>{{$user_forums->count()}}</h3>
                                    @endif Forums
                                </span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @if(Auth::user()->is_admin ==true)
              <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                    <div class="card dash-widget">
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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                    <div class="card dash-widget">
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
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Application number</th>
                                            <th>Driving School Status</th>
                                            <th>Transaction status</th>
                                            <th>Generate card status</th>
                                            <th>dob</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($application as $apply)

                                             <tr>

                                                <td>{{$apply->id}}</td>
                                                <td>{{$apply->application_number}}</td>

                                                @if ($apply->driving_school_status == 'pending')
                                                  <td><span class="badge badge-danger">Pending</span></td>
                                                @else
                                                  <td><span class="badge badge-success">Pass</span></td>
                                                @endif

                                                @if ($apply->transaction_status == 'pending')
                                                  <td><span class="badge badge-danger">Pending</span></td>
                                                @else
                                                  <td><span class="badge badge-success">Approved</span></td>
                                                @endif

                                                @if ($apply->generate_card == 'pending')
                                                  <td><span class="badge badge-danger">Pending</span></td>
                                                @else
                                                  <td><span class="badge badge-success">Yes</span></td>
                                                @endif
                                                <td>{{$apply->dob}}</td>

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
                                                            <a class="dropdown-item" href="{{url('view_application',$apply->id)}}"><em
                                                                class="fa fa-eye-slash m-r-5"></em> View
                                                         </a>
                                                             <a class="dropdown-item" href="{{url('approve_driving_school',$apply->id)}}"><em
                                                                    class="fa fa-check m-r-5"></em> Approve Driving School Certificate
                                                             </a>
                                                             <a class="dropdown-item" href="{{url('approve_generate_card',$apply->id)}}"><em
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
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                    <div class="card dash-widget">
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
                                        @foreach ($transactions as $trans)
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

                                </tbody>
                            </table>
                           </div>
                        </div>
                    </div>
                </div>


              </div>
            @endif
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection
