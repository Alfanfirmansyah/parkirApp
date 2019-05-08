@extends('layouts.templateOPMaster')
@section('title')
<title>Cetak Laporan | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarLaporan')
@endsection
@section('content')  
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-indigo">
        <div class="icon">
            <i class="material-icons">event</i>
        </div>
        <div class="content">
            <div class="text">DATE NOW</div>
            <div class="">{{ $tgl }}</div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-red">
        <div class="icon">
            <i class="material-icons">local_parking</i>
        </div>
        <div class="content">
            <div class="text">TEMPAT PARKING</div>
            <div class="">{{ auth()->user()->customer['name'] }}
                        
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-sm-7">
        <div class="card">
            <div class="body">
            <form method="post" action="/daily" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <div class="col-md-10">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif 
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">event</i>
                            </span>                       
                            <div class="form-line">
                                <input type="date" class="form-control" autocomplete="off" required name="tgl" />
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <button type="Submit" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal">
                            <i style="color:#fff" class="material-icons">print</i>
                            <span>Cetak</span>
                            </button>
                        </div>
                    </form>

					
               
                </div>
            </div>
        </div>
    </div>

@endsection