@extends('layouts.templateMaster')
@section('title')
<title>Manage Kategori | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarKategori')
@endsection
@section('content')  
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Kategori
                </h2>
                <ul class="header-dropdown m-r--5" style="margin-top:-1%">
                    <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal">
                    <i style="color:#fff" class="material-icons">add</i>
                    <span>Add New Data</span>
                    </button>
                </ul>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Form Data Kategori</h4>
                                <hr>
                            </center>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
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
                                    <i class="material-icons">category</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" name="kendaraan" class="form-control date" placeholder="Jenis Kendaraan">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                        <button type="Submit" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal">
                        <i style="color:#fff" class="material-icons">save</i>
                        <span>SAVE</span>
                        </button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="body">
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
                                <th>Jenis Kendaraan</th>
                                <th class="col-md-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $row)
                            <tr>
                                <td>{{$row->kendaraan}}</td>
                                <td>
                                    <form action="{{ route('kategori.destroy', $row->kategori_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-icon btn-sm btn-danger" type="submit">
                                        <i style="color:#fff" class="material-icons">delete</i>
                                        <span>Delete</span>
                                        </button>
                                        </a>
                                    </form>
                                    <a href="{{ route('kategori.edit',$row->kategori_id)}}">
                                    <button class="btn btn-icon btn-sm btn-info" type="button" style="margin-top:4%;width:84px">
                                    <i style="color:#fff" class="material-icons">border_color</i>
                                    <span>Edit</span>
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