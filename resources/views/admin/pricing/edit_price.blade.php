@section('title')
<title>Edit Pricing | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarCustomer')
@endsection
@extends('layouts.templateMaster')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Data Pricing
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{ route('pricing.update',$price->pricing_id) }}" enctype="multipart/form-data">
                    @method('PATCH')
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
                        <select class="form-control show-tick" required name="kategori_id">
                            <option value="">- Select Jenis Kategori- </option>
                            @foreach($kategori as $row)
                            <option value="{{ $row->kategori_id }}" {{ $price->kategori_id == $row->kategori_id ? 'selected="selected"' : '' }}> {{ $row->kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                        <i class="material-icons">attach_money</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" value="{{$price->harga}}" name="harga" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="Submit" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal">
                        <i style="color:#fff" class="material-icons">save</i>
                        <span>UPDATE</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection