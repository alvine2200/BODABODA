<base href="/public">
@extends('layouts.smart-hr')
@section('content')
    <div class="page-wrapper">
         @include('layouts.partials.flash')


         <div class="content container-fluid">

            <div class="row mx-auto mt-3">
                <div style=" font-weight: bold; font-size:16px; border:1px solid grey; padding: 30px;" class="col-md-6">
                    Generate Card Status
                </div>
                <div style="border:1px solid grey; padding: 30px;" class="col-md-6">
                    {{$view->generate_card}}
                </div>
                <div style=" font-weight: bold; font-size:16px; border:1px solid grey; padding: 30px;" class="col-md-6">
                    Driving School Status
                </div>
                <div style="border:1px solid grey; padding: 30px;" class="col-md-6">
                    {{$view->driving_school_status}}
                </div>
                <div style=" font-weight: bold; font-size:16px; border:1px solid grey; padding: 30px;" class="col-md-6">
                    Application Number
                </div>
                <div style="border:1px solid grey; padding: 30px;" class="col-md-6">
                    {{$view->application_number}}
                </div>
                <div style=" font-weight: bold; font-size:16px; border:1px solid grey; padding: 30px;" class="col-md-6">
                 Fullname
                </div>
                <div style="border:1px solid grey; padding: 30px;" class="col-md-6">
                    {{$view->users->fullname}}
                </div>
                <div style=" font-weight: bold; font-size:16px; border:1px solid grey; padding: 30px;" class="col-md-6">
                    National Id
                 </div>
                 <div style="border:1px solid grey; padding: 30px;" class="col-md-6">
                       {{$view->users->id_number}}
                 </div>
                 <div style=" font-weight: bold; font-size:16px; border:1px solid grey; padding: 30px;" class="col-md-6">
                    Phone Number
                 </div>
                 <div style="border:1px solid grey; padding: 30px;" class="col-md-6">
                       {{$view->users->phone}}
                   </div>

                <div style=" font-weight: bold; font-size:16px; border:1px solid grey; padding: 30px;" class="col-md-6">
                    Date Of Application
                </div>
                <div style="border:1px solid grey; padding: 30px;" class="col-md-6">
                    {{$view->created_at}}
                </div>
            </div>

         </div>

    </div>

@endsection

