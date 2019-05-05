@section('title')
<title>Edit Cusotmer| Page</title>
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
@endsection
@extends('layouts.templateOPMaster')
@section('content')
<style>
    #map-canvas{
    width:100%;
    height:300px;
    }
</style>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAafgoWn7nSfw4o5ctci8yvyWOQmAD93g4&libraries=customers"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Data Parking customer
                </h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Data customer</a></li>
                    <li role="presentation"><a href="#change_image_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Image customer</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                        <form method="post" action="{{ route('customer.update',$customer->customer_id) }}" enctype="multipart/form-data">
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
                            <div class="panel panel-default panel-post">
                                <div class="panel-heading">
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="material-icons">person_pin_circle</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" value="{{$customer->name}}">
                                                </div>
                                            </div>
                                            <div class="col s12">
                                                <input type="text" name="address" value="{{$customer->address}}" class="form-control" id="searchmap" customerholder="Cari Lokasi">
                                                <div id="map-canvas"></div>
                                            </div>
                                            <br>
                                            <div class="col-md-6">
                                                <label for="">Latitude</label>
                                                <input class="form-control" id="lat" type="text" name="latitude" value="{{$customer->latitude}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Longitude</label>
                                                <input class="form-control" id="lng" type="text" name="longitude" value="{{$customer->longitude}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <ul>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
                                        <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                                    </ul>
                                </div>
                        </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="change_image_settings">
                        <div class="panel panel-default panel-post">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="col-md-6">
                                            <div id="carousel-example-generic_{{$customer->customer_id}}" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <?php $a = 0 ?>
                                                    <?php foreach (json_decode($customer->image)as $gambar) { ?>
                                                    <li data-target="#carousel-example-generic_{{$customer->customer_id}}" data-slide-to="$a++" class=""></li>
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
                                                <a class="left carousel-control" href="#carousel-example-generic_{{$customer->customer_id}}" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example-generic_{{$customer->customer_id}}" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <form method="post" action="/updateImgParking/{{ $customer->customer_id }}" enctype="multipart/form-data">
                                                @csrf
                                                <i class="fa fa-image"></i> Foto Parking
                                                <div class="input-group control-group increment" >
                                                    <input type="file" name="filename[]" class="form-control" required>
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-primary waves-effect" type="button"><i class="fa fa-plus"></i> Add</button>
                                                    </div>
                                                </div>
                                                <div class="clone hide">
                                                    <div class="control-group input-group" style="margin-top:10px">
                                                        <input type="file" name="filename[]" class="form-control">
                                                        <div class="input-group-btn"> 
                                                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-upload"></i> Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    
    $(".btn-primary").click(function(){ 
        var html = $(".clone").html();
        $(".increment").after(html);
    });
    
    $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".control-group").remove();
    });
    
    });
    
</script>
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
            draggable:true
    });
    var input = document.getElementById('searchmap');
        var searchBox = new google.maps.customers.SearchBox(input);
    
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
        });
        google.maps.event.addListener(searchBox,'customers_changed',function(){
            var customers = searchBox.getcustomers();
            var bounds = new google.maps.LatLngBounds();
            var i, customer;
            for(i=0; customer=customers[i];i++){
                bounds.extend(customer.geometry.location);
                marker.setPosition(customer.geometry.location);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
@endsection