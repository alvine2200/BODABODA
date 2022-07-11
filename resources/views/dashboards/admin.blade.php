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
                            <span class="dash-widget-icon"><i class="fa fa-briefcase"></i></span>
                            <div class="dash-widget-info">
                                <h3></h3>
                                <span>Transactions</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget ">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-hotel"></i></span>
                            <div class="dash-widget-info">
                                <h3></h3>
                                <span>Applications</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="la la-user"></i></span>
                            <div class="dash-widget-info">
                                <h3></h3>
                                <span>Users</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-car"></i></span>
                            <div class="dash-widget-info">
                                <h3></h3>
                                <span>Queries</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection
