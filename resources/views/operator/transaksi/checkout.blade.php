@extends('layouts.templateOPMaster')
@section('title')
<title>Tiket Parkir | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarTransaksi')
@endsection
@section('content')
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                <i class="fa fa-ticket"></i>  Tiket Parking
            </h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                @if(session()->get('success'))
                <div class="alert alert-success alert-close">
                    {{ session()->get('success') }}  
                </div>
                <br />
                @endif
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                <i class="material-icons">local_parking</i>{{ auth()->user()->customer['name'] }}<small>Ticket Parking</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);">
                                    <i class="material-icons">print</i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div class="col-md-3">
                                    {!! $qrcode !!}
                                </div>
                                <div style="margin-left:25px; margin-top:20px" class="col-md-2">
                                    <br> 
                                    	Kode Parking   <hr>
                                        No Plat        <hr>
                                        Tanggal Masuk  <hr>
                                        Tanggal Keluar <hr>
                                        Harga      	   <hr>
                                        Status         <hr>
                                </div>
                                <div style="margin-top:20px;" class="col-md-6">
                                    <br> 
                                    <h5>
                                        @foreach ($checkout as $row)
                                        {{$row->kode_qrcode}} <hr>
                                        {{$row->no_plat}} <hr>
                                        {{$row->tgl_masuk}} <hr>
                                        {{$row->tgl_keluar}} <hr><br>
                                        Rp.{{number_format($row->harga,0)}}<hr>
                                        {{$row->status}} <hr>
                                      
                                        @endforeach
                                    </h5>
                                </div>
          
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/operator">
                <button class="btn btn-icon btn-sm btn-danger" type="submit" style="width:96px; float:right">
                <i style="color:#fff" class="material-icons">check_circle</i>
                <span>Selesai</span>
                </button></a>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->
@endsection