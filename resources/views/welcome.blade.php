@section('title')
<title>Admin Dashboard | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarDashboard')
@endsection
@extends('layouts.templateMaster')
@section('content')
<div class="block-header">
    <h2>Dashboard</h2>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-indigo hover-expand-effect">
        <div class="icon">
            <i class="material-icons">event</i>
        </div>
        <div class="content">
            <div class="text">DATE NOW</div>
            <div class="">{{ $tgl }}</div>
        </div>
    </div>
</div>
<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Dashboard
                </h2>
            </div>
            <div class="body">
                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">Total Customer</div>
                                <div class="number count-to">{{$customer}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">person</i>
                            </div>
                            <div class="content">
                                <div class="text">Total Operator</div>
                                <div class="number count-to">{{$user}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">local_parking</i>
                            </div>
                            <div class="content">
                                <div class="text">Total Parking</div>
                                <div class="number count-to">{{$keluar}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">money</i>
                            </div>
                            <div class="content">
                                <div class="text">Total Pendapatan</div>
                                <div class="number count-to">20000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
            </div>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->    
@endsection