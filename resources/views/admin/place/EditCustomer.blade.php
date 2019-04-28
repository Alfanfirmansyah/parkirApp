@extends('layouts.templateMaster')
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
                    Update Status Customer
                </h2>
            </div>
            <div class="body">
               <form method="post" action="{{ route('customer.update',$place->id_customer) }}" enctype="multipart/form-data">
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
                    <label for="sel1">Pilih Status :</label>
                        <select class="form-control show-tick" name="status">
                            <option value="{{$place->status}}">{{$place->status}}</option>
                            <option value="Terverifikasi">Terverifikasi</option>
                         </select>
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
