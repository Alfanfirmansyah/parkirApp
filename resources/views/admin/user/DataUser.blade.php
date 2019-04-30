    @section('title')
	<title>Manage Admin | Page</title>
	@endsection
	@section('leftside')
	  <!-- Left Sidebar -->
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('assets/images/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} </div>
                    <div class="email"> {{ Auth::user()->email }} </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li>  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       
                                    <i class="material-icons">input</i>Sign Out</a></li>
									 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
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
                                <a href="/customer/create">Add Customer</a>
                                <a href="/customer">Data Customer</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="/kategori">
                            <i class="material-icons">list</i>
                            <span>Manage Kategori</span>
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
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->

	
	@endsection

@extends('layouts.templateMaster')
@section('content')  <div class="row clearfix">
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
                                        <h4 class="modal-title" id="defaultModalLabel">Form Data Admin</h4><hr>
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
                        <!-- End Modal -->

                    
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Adress</th>
                                            <th>Phone</th>
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