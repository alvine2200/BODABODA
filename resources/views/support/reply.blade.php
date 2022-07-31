<base href="/public">
@extends('layouts.smart-hr')
@section('content')
<div class="page-wrapper">
    @include('layouts.partials.flash')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="account-wrapper">
                            <p style="font-size:20px!important; font-weight:bold;"
                                class="account-subtitle fw-bold display-2">Reply to a Ticket</p>
                                </p>
                                <p class="float-start">Send Reply Message</p>
                                <hr  class="mb-3">
                    </div>
                    <div class="card-body">
                            <form action="{{url('reply',$support->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">Reply Message</label>
                                    <textarea class="form-control" placeholder="Enter the reply message here ..." rows="5" type="text" name="reply"></textarea>
                                </div>

                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn col-12">Send Reply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
