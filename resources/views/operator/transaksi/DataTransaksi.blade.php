@section('title')
<title>Manage Data Parkir | Page</title>
@endsection
@section('leftside')
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