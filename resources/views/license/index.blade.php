<base href="/public">
@extends('layouts.smart-hr')
@section('content')
    <div class="page-wrapper">
        @include('layouts.partials.flash')        

        <div class=" container-fluid content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div  class="card-deck mt-5 ml-3 mr-3 col-md-6 mx-auto">                                
                                <div style="background-color:azure;" class="card">
                                    <h5 class="card-title mt-3 mb-3 mx-auto"> BodaBoda Association of Kenya</h5>
                                     <img class="card-img-top mx-auto" style="height:150px; width:150px; border-radius:50%;" src="User/profiles/{{$user->avatar}}" alt="Card image cap">
                                    <div class="card-body mx-auto">                                                                              
                                      <h5 class="card-title"> Name: {{$user->fullname}}</h5>
                                      <p class="card-text">License Number: 223443452</p>
                                      <p class="card-text">Date Alocated: {{$user->updated_at}}</p>
                                    </div>
                                </div>                   
                                
                              </div>
                        </div>

                        <div class="pdf mb-3 mx-auto">
                            <a class="btn btn-primary" href="{{url('generate-pdf',$user->id)}}"><em class="fa fa-save"></em>Download License</a>
                            <a class="btn btn-primary" href="{{url('view-pdf',$user->id)}}"><em class="fa fa-eye-slash"></em>View License</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection