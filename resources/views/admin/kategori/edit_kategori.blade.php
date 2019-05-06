@extends('layouts.templateMaster')
@section('title')
<title>Edit Kategori | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarKategori')
@endsection
@section('content')  
<style>
    #map-canvas{
    width:100%;
    height:300px;
    }
</style>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Data Kategori
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{ route('kategori.update',$kategori->kategori_id) }}" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$kategori->kendaraan}}" name="kendaraan" />
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