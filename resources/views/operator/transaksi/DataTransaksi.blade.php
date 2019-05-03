@section('title')
<title>Manage Data Parkir | Page</title>
@endsection
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
                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
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
        <li>
            <a href="{{ url('operator')}}">
            <i class="material-icons">dashboard</i>
            <span>Manage Parking</span>
            </a>
        </li>
        <li class="active">
            <a href="/transaksi">
            <i class="material-icons">subject</i>
            <span>Data Parkir</span>
            </a>
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
@extends('layouts.templateOPMaster')
@section('content')  
<div class="row clearfix">
    <div class="col-md-12 col-sm-7">
        <div class="card">
            <div class="body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#masuk" aria-controls="profile" role="tab" data-toggle="tab">Data Parkir Masuk</a></li>
                        <li role="presentation"><a href="#keluar" aria-controls="settings" role="tab" data-toggle="tab">Data Parkir Keluar</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="masuk">
                            <div class="table-responsive">
                                @if(session()->get('success'))
                                <div class="alert alert-success alert-close">
                                    {{ session()->get('success') }}  
                                </div>
                                <br />
                                @endif
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Kode Parkir</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Harga</th>
                                            <th>No Plat</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi as $row)
                                        <tr>
                                            <td>{{$row->kode_qrcode}}</td>
                                            <td>{{$row->get_kategori->kendaraan}}</td>
                                            <td>{{$row->harga}}</td>
                                            <td>{{$row->no_plat}}</td>
                                            <td>{{$row->tgl_masuk}}</td>
                                            <td>{{$row->tgl_keluar}}</td>
                                            <td><p class="btn btn-success btn-sm">{{$row->status}}</p></td>
                   
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
						
						<!-- status keluar -->
                        <div role="tabpanel" class="tab-pane fade in" id="keluar">
                                   <div class="table-responsive">
                                @if(session()->get('success'))
                                <div class="alert alert-success alert-close">
                                    {{ session()->get('success') }}  
                                </div>
                                <br />
                                @endif
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Kode Parkir</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Harga</th>
                                            <th>No Plat</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($keluar as $row)
                                        <tr>
                                            <td>{{$row->kode_qrcode}}</td>
                                            <td>{{$row->get_kategori->kendaraan}}</td>
                                            <td>{{$row->harga}}</td>
                                            <td>{{$row->no_plat}}</td>
                                            <td>{{$row->tgl_masuk}}</td>
                                            <td>{{$row->tgl_keluar}}</td>
                                            <td><p class="btn btn-danger btn-sm">{{$row->status}}</p></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection