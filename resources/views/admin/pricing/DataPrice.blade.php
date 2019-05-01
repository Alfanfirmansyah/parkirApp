@extends('layouts.templateMaster')
@section('content')  
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <i class="fa fa-dollar"></i>  Data Pricing Kendaraan
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
                                <h4 class="modal-title" id="defaultModalLabel">Form Data Pricing Kendaraan</h4>
                                <hr>
                            </center>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('pricing.store') }}" enctype="multipart/form-data">
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
                                    <select class="form-control show-tick" required name="id_kategori">
                                        <option value="">- Select Jenis Kategori- </option>
                                        @foreach($kategori as $row)
                                        <option value="{{ $row->id_kategori }}">{{ $row->kendaraan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="material-icons">attach_money</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="number" autocomplete="off" name="harga" class="form-control" placeholder="Harga">
                                        <input type="hidden" autocomplete="off" name="id_customer" value="{{ Auth::user()->id }}">
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
                                <th>Harga</th>
                                <th class="col-md-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($price as $row)
                            <tr>
                                <td>{{$row->getKategori->kendaraan}}</td>
                                <td>Rp.{{number_format($row->harga,0)}}</td>
                                <td>
                                    <form action="{{ route('pricing.destroy', $row->id_price)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-icon btn-sm btn-danger" type="submit">
                                        <i style="color:#fff" class="material-icons">delete</i>
                                        <span>Delete</span>
                                        </button>
                                        </a>
                                    </form>
                                    <a href="{{ route('pricing.edit',$row->id_price)}}">
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