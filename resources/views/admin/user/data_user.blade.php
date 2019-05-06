@section('title')
<title>Manage Admin | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarUser')
@endsection
@extends('layouts.templateMaster')
@section('content')  
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Admin
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
                                <h4 class="modal-title" id="defaultModalLabel">Form Data Admin</h4>
                                <hr>
                            </center>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
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
                                        <input type="text" name="name" class="form-control date" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password" class="form-control date" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" class="form-control date" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="3" name="address" class="form-control date" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="telp" class="form-control date" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="foto" class="form-control date" >
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                        <button type="Submit" class="btn btn-info waves-effect">
                        <i style="color:#fff" class="material-icons">save</i>
                        <span>SAVE</span>
                        </button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Adress</th>
                                <th>Phone</th>
                                <th>Foto</th>
                                <th class="col-md-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->telp}}</td>
                                <td><img style="width:90px;height:90px" src="{{ asset('images/' . $row->foto) }}" /></td>

                                <td>
                                    <form action="{{ route('user.destroy', $row->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-icon btn-sm btn-danger" type="submit">
                                        <i style="color:#fff" class="material-icons">delete</i>
                                        <span>Delete</span>
                                        </button>
                                        </a>
                                    </form>
                                    <a href="{{ route('user.edit',$row->id)}}">
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