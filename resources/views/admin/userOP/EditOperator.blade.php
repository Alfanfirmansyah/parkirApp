@section('title')
<title>Update user | Page</title>
@endsection
@section('leftside')
<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="/admin">
            <i class="material-icons">dashboard</i>
            <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">person</i>
            <span>Manage Customer</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="/">Add Customer</a>
                    <a href="/">Data Customer</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/user">
            <i class="material-icons">list</i>
            <span>Manage user</span>
            </a>
        </li>
        <li>
            <a href="/role">
            <i class="material-icons">category</i>
            <span>Manage Role</span>
            </a>
        </li>
        <li class="active">
            <a href="/user">
            <i class="material-icons">person</i>
            <span>Manage Admin</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->
@endsection
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
                    Edit Data user
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{ route('userop.update',$user->id) }}" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" value="{{$user->name}}" name="name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" class="form-control" value="{{$user->password}}" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$user->email}}" name="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$user->telp}}" name="telp" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$user->address}}" name="address" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" class="form-control" value="{{$user->foto}}" name="foto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="Submit" class="btn btn-info waves-effect" >
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