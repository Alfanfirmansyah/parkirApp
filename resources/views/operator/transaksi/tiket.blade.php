@section('title')
<title>Ticket Parking | Page</title>
@endsection
@section('leftside')
<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <a href="{{ url('operator')}}">
            <i class="material-icons">dashboard</i>
            <span>Manage Parking</span>
            </a>
        </li>
        <li>
            <a href="/transaksi">
            <i class="material-icons">subject</i>
            <span>Data Parkir</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->
@endsection
@extends('layouts.templateOPMaster')
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
                                    <h5> Kode Parking <br><br>
                                        No Plat <br><br>
                                        Tgl Masuk    <br><br>
                                        Harga <br><br>
                                    </h5>
                                </div>
                                <div style="margin-top:20px;" class="col-md-6">
                                    <br> 
                                    <h5>
                                        @foreach ($trs as $tr)
                                        {{$tr->kode_qrcode}} <br><br>
                                        {{$tr->no_plat}} <br><br>
                                        {{$tr->tgl_masuk}} <br><br>
                                        Rp.{{number_format($tr->harga,0)}} <br><br>
                                        @endforeach
                                    </h5>
                                </div>
                                <div style="margin-left:25px;" class="col-md-8">
                                    Harap simpan bukti parkir ini, Terimakasih
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