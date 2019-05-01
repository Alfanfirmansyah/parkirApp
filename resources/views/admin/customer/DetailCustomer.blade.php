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
                    <i class="material-icons">input</i>Sign Out</a>
                </li>
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
                    <i class="material-icons">local_parking</i>   Detail Parking Customer   {{$customer->nama_customer}}
                </h2>
            </div>
            <div class="body">
                <style>
                    #map-canvas{
                    width:100%;
                    height:300px;
                    }
                </style>
                <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAafgoWn7nSfw4o5ctci8yvyWOQmAD93g4&libraries=places"></script>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6">
                            <div id="carousel-example-generic_{{$customer->id_customer}}" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php $a = 0 ?>
                                    <?php foreach (json_decode($customer->image)as $gambar) { ?>
                                    <li data-target="#carousel-example-generic_{{$customer->id}}" data-slide-to="$a++" class=""></li>
                                    <?php } ?>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img style="width:100%; height:320px" src="{{ asset('/images/'.array_first(json_decode($customer->image))) }}" />
                                    </div>
                                    <?php foreach (json_decode($customer->image)as $gambar) { ?>									
                                    <div class="item">
                                        <img style="width:100%; height:320px" src="{{ asset('/images/'.$gambar) }}">
                                    </div>
                                    <?php } ?>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_{{$customer->id_customer}}" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_{{$customer->id_customer}}" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <br>
                            <p><i class="fa fa-map-marker"></i> {{$customer->address}}</p>
                        </div>
                        <div class="col-md-6">
                            <i class="fa fa-map-o"></i> Map Location
                            <div id="map-canvas"></div>
                            <div class="col-md-6">
                                <label for="">Lat</label>
                                <input class="form-control" id="lat" type="text" style="border:none" readonly value="{{$customer->latitude}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Lng</label>
                                <input class="form-control" id="lng" type="text"style="border:none" readonly value="{{$customer->longitude}}">
                            </div>
                        </div>
                    </div>
                    <!-- #END# Basic Examples -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-5">
        <div class="card">
            <div class="header">
                <h2>
                    <i class="material-icons">money</i>   Pricing   {{$customer->nama_customer}}
                </h2>
                <ul class="header-dropdown m-r--5" style="margin-top:-1%">
                    <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal">
                    <i style="color:#fff" class="material-icons">add</i>
                    <span>Add New Data</span>
                    </button>
                </ul>
            </div>
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
                                        <input type="number" name="harga" class="form-control" placeholder="Harga">
                                        <input type="hidden" name="id_customer" value="{{ $customer->id_customer }}">
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
                        <!-- Modal Operaotr-->
            <div class="modal fade" id="defaultModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Form Data Operator</h4>
                                <hr>
                            </center>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('userop.store') }}" enctype="multipart/form-data">
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
                                        <input type="file" name="foto" class="form-control date" placeholder="Foto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="telp" class="form-control date" placeholder="Phone">
                                        <input type="hidden" name="id_customer" value="{{$customer->id_customer}}">
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
                <div class="table-responsive">
                    @if(session()->get('success'))
                    <div class="alert alert-success alert-close">
                        {{ session()->get('success') }}  
                    </div>
                    <br />
                    @endif
                    <table class="table table-bordered">
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
                                        </button>
                                        </a>
                                    </form>
                                    <a href="{{ route('pricing.edit',$row->id_price)}}">
                                    <button class="btn btn-icon btn-sm btn-info" type="button" style="margin-top:4%">
                                    <i style="color:#fff" class="material-icons">border_color</i>
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
    <div class="col-md-7">
        <div class="card">
            <div class="header">
                <h2>
                    <i class="material-icons">person</i>  Operator {{$customer->nama_customer}}
                </h2>
                <ul class="header-dropdown m-r--5" style="margin-top:-1%">
                    <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal2">
                    <i style="color:#fff" class="material-icons">add</i>
                    <span>Add New Data</span>
                    </button>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if(session()->get('success2'))
                    <div class="alert alert-success alert-close">
                        {{ session()->get('success2') }}  
                    </div>
                    <br />
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Foto</th>
                                <th class="col-md-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userop as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->telp}}</td>
                                <td>{{$row->address}}</td>
                                <td><img style="width:90px;height:90px" src="{{ asset('images/' . $row->foto) }}" /></td>
                                <td>
                                    <form action="{{ route('userop.destroy', $row->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-icon btn-sm btn-danger" type="submit">
                                        <i style="color:#fff" class="material-icons">delete</i>
                                        </button>
                                        </a>
                                    </form>
                                    <a href="{{ route('userop.edit',$row->id)}}">
                                    <button class="btn btn-icon btn-sm btn-info" type="button" style="margin-top:4%">
                                    <i style="color:#fff" class="material-icons">border_color</i>
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
<script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map-canvas')
        ,{
            center:{
                lat:<?php echo $customer->latitude?>,
                 lng:<?php echo $customer->longitude?>
            },
            zoom:15
        }
        );
        infoWindow = new google.maps.InfoWindow;
    
    var marker = new google.maps.Marker({
        position: {
                lat:<?php echo $customer->latitude?>,
                lng:<?php echo $customer->longitude?>
            },
            map: map,
            draggable:false
    });
    var input = document.getElementById('searchmap');
        var searchBox = new google.maps.places.SearchBox(input);
    
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
        });
        google.maps.event.addListener(searchBox,'places_changed',function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    
        
</script>
<script src="{{ asset('assets/js/gmaps.js') }}"> </script>
@endsection