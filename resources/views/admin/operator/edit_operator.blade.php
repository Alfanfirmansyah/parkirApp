@section('title')
<title>Edit Operator | Page</title>
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