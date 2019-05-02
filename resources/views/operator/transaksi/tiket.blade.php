@extends('layouts.templateOPMaster')
@section('leftside')
<!-- Left Sidebar -->
<!-- User Info -->
<div class="user-info">
    <div class="image">
        <img src="{{ asset('assets/images/user.png')}}" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} </div>
        <div class="email"> {{ Auth::user()->email }} </div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="{{ route('operator.edit',Auth::user()->id) }}"><i class="material-icons">person</i>Profile</a></li>
                <li role="separator" class="divider"></li>
                <li role="separator" class="divider"></li>
                <li>  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i>Sign Out</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>
<!-- #User Info -->
<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <a href="{{ url('operator')}}">
            <i class="material-icons">dashboard</i>
            <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">receipt</i>
            <span>Laporan Parking</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="/transaksi">Data Parking</a>
                    <a href="/cetak">Print Daily Parking</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- #Menu -->
<!-- Footer -->
<div class="legal">
    <div class="copyright">
        &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
    </div>
    <div class="version">
        <b>Version: </b> 1.0.5
    </div>
</div>
<!-- #Footer -->
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
                                <i class="material-icons">local_parking</i>@foreach($customer as $cs ) {{ $cs->nama_customer }} @endforeach<small>Ticket Parking</small>
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
                                    {!! $tiket !!}
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