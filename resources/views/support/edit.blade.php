<base href="/public">
@extends('layouts.smart-hr')
@section('content')
<div class="page-wrapper">

    @include('layouts.partials.flash')

    <div class="content">
        <div class="mx-auto">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="account-wrapper">
                                <p style="font-size:20px!important; font-weight:bold;"
                                    class="account-subtitle fw-bold display-2">Edit Support Ticket</p>
                                    </p>
                                    <p class="float-start">Edit a Ticket</p>
                                    <hr  class="mb-3">
                        </div>
                        <div class="card-body">
                            <form action="{{url('update_ticket',$user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">Subject <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" value="{{$user->subject}}"
                                        placeholder="Enter the subject of the ticket"  type="text" name="subject">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Message</label>
                                    <textarea class="form-control" rows="5"
                                        placeholder="Enter the message"  type="text" name="message"> {{$user->message}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Photo </label>
                                    <input class="form-control" type="file" name="photo">
                                        <img class="img-responsive mt-2" style="width:300px; height:200px;" alt="img" src="/pictures/support/{{$user->photo}}">
                                </div>

                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn col-12">Update a ticket</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
