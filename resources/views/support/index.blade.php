@extends('layouts.smart-hr')
@section('content')
<div class="page-wrapper">

    @include('layouts.partials.flash')

    <div class="content container-fluid">
        <div class="mx-auto">
            <div class="row">
                <div class="col-auto float-right ml-auto mb-5">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_ticket">
                        <em class="fa fa-plus"></em> Create a Ticket</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ticket Number</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Time Sent</th>
                                        <th>Status</th>
                                        <th>Reply Message</th>
                                        <th>Time of Reply</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($support as $fo)

                                         <tr>

                                            <td>{{$fo->id }}</td>
                                            <td>{{$fo->ticket_number }}</td>
                                            <td>{{$fo->subject }}</td>
                                            <td>{{$fo->message }}</td>
                                            <td>{{$fo->time_sent }}</td>
                                            <td>{{$fo->status }}</td>
                                            <td>{{$fo->reply }}</td>
                                            <td>{{$fo->time_replied }}</td>

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
                                                            @if (Auth::user()->is_admin == true)
                                                                <a class="dropdown-item" href="{{url('reply_ticket',$fo->id)}}"><em
                                                                        class="fa fa-comment m-r-5"></em> Reply
                                                                </a>
                                                            @endif
                                                            <a class="dropdown-item" href="{{url('edit_ticket',$fo->id)}}"><em
                                                                class="fa fa-pen m-r-5"></em> Edit
                                                            </a>
                                                            <a class="dropdown-item" href="{{url('resolve_ticket',$fo->id)}}"><em
                                                                class="fa fa-check m-r-5"></em> Resolved
                                                            </a>
                                                            <a class="dropdown-item" href="{{url('delete_ticket',$fo->id)}}"><em
                                                                    class="fa fa-trash m-r-5"></em> Delete
                                                            </a>

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


                                        <div id="create_ticket" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Create A Ticket</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('create_ticket')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="col-form-label">Subject <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control @error('subject') is-invalid @enderror"
                                                                    placeholder="Enter the subject of the ticket" required type="text" name="subject">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Message<span
                                                                        class="text-danger">*</span></label>
                                                                <textarea class="form-control @error('message') is-invalid @enderror" rows="5"
                                                                    placeholder="Enter the message" required type="text" name="message"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Photo <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control @error('photo') is-invalid @enderror"
                                                                     required type="file" name="photo">
                                                            </div>

                                                            <div class="submit-section">
                                                                <button type="submit" class="btn btn-primary submit-btn col-12">Send a ticket</button>
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

    </div>
</div>

@endsection
