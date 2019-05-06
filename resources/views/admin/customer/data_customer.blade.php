@extends('layouts.templateMaster')
@section('title')
<title>Manage Customer | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarCustomer')
@endsection
@section('content')  
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Parking customer
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
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th class="col-md-2">Aksi</th>
                                <th>Nama Customer</th>
                                <th>Address</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $row)
                            <tr>
                                <td>
                                    <a href="{{ route('customer.show',$row->customer_id)}}">
                                    <button class="btn btn-icon btn-sm btn-success" type="button" style="margin-top:4%">
                                    <i style="color:#fff" class="material-icons">dashboard</i>
                                    <span>Detail</span>
                                    </button>
                                    </a>
                                    <a href="{{ route('customer.edit',$row->customer_id)}}">
                                    <button class="btn btn-icon btn-sm btn-info" type="button" style="margin-top:4%;width:96px">
                                    <i style="color:#fff" class="material-icons">border_color</i>
                                    <span>Edit</span>
                                    </button>
                                    </a>
                                    <form action="{{ route('customer.destroy', $row->customer_id)}}" method="post" style="margin-top:4%";>
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-icon btn-sm btn-danger" type="submit" style="width:96px">
                                        <i style="color:#fff" class="material-icons">delete</i>
                                        <span>Delete</span>
                                        </button>
                                        </a>
                                    </form>
                                </td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->address}}</td>
                                <td><img style="width:200px; height:170px" src="{{ asset('/images/'.$row->image) }}" /></td>
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