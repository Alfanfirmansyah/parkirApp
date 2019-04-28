@extends('layouts.templateMaster')
@section('content')  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Parking Place
                            </h2>
                        </div>

                    
                        <div class="body">
                            <div class="table-responsive">
                                    @if(session()->get('success'))
                                    <div class="alert alert-success alert-close">
                                        {{ session()->get('success') }}  
                                    </div><br />
                                    @endif
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Place</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th class="col-md-2">Aksi</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($place as $row)
                                        <tr>
                                            <td>{{$row->nama_place}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>
                                            <?php 
                                            if($row->status == 'Belum diverifikasi') {?>
                                            <button class="btn btn-danger btn-sm">{{$row->status}}</button>
                                            <?php } else if($row->status== 'Terverifikasi') {?>
                                            <button class="btn btn-success btn-sm">{{$row->status}}</button>

                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php foreach (json_decode($row->img)as $gambar) { ?>									
                                                <div class="item">
                                                    <img style="width:250px; height:250px" src="{{ asset('/images/'.$gambar) }}">
                                                </div>
                                            <?php } ?>
                                            </td>
                                            <td>
                                                <form action="{{ route('customer.destroy', $row->id_customer)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="return confirm('Are you sure?')">
                                                    <button class="btn btn-icon btn-sm btn-danger" type="submit">
                                                    <i style="color:#fff" class="material-icons">delete</i>
                                                    <span>Delete</span>
                                                    </button>
                                                </a>
                                                </form>
                                            
                                                <a href="{{ route('customer.edit',$row->id_customer)}}">
                                                    <button class="btn btn-icon btn-sm btn-info" type="button" style="margin-top:4%">
                                                    <i style="color:#fff" class="material-icons">border_color</i>
                                                    <span>Update</span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        @endsection