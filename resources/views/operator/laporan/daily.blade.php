
@extends('layouts.templateOPMaster')
@section('leftside')
@include('layouts.sidebarLaporan')
@endsection
@section('content')  
<div class="row clearfix">
    <div class="col-md-12 col-sm-7">
        <div class="card">
            <div class="body">
               <h1> Laporan Parking Tanggal : @foreach($transaksi as $row)
                                            <?php  $data = $row->tgl_keluar;
                                                   $create = new dateTime($data);
                                                   echo date_format($create, 'd-m-Y');
                                            ?>
                                          @endforeach </h1>
            <br>
            <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode Parkir</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>No Plat</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                            <th>Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi as $row)
                                        <tr>
                                            <td>{{$row->kode_qrcode}}</td>
                                            <td>{{$row->get_kategori->kendaraan}}</td>
                                            <td>{{$row->no_plat}}</td>
                                            <td>{{$row->tgl_masuk}}</td>
                                            <td>{{$row->tgl_keluar}}</td>
                                            <td>{{$row->harga}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
               
                </div>
            </div>
        </div>
    </div>

@endsection