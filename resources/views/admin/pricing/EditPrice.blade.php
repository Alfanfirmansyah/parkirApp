@section('title')
	<title>Manage Customer | Page</title>
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
                    <li class="active">
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
					<li>
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
               <form method="post" action="{{ route('pricing.update',$price->id_price) }}" enctype="multipart/form-data">
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
                                         	<select class="form-control show-tick" required name="id_kategori">
											<option value="">- Select Jenis Kategori- </option>
												@foreach($kategori as $row)
												<option value="{{ $row->id_kategori }}" {{ $price->id_kategori == $row->id_kategori ? 'selected="selected"' : '' }}> {{ $row->kendaraan }}</option>
											
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
