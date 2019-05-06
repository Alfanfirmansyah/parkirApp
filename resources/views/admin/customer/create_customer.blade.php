@section('title')
<title>Manage Customer | Page</title>
@endsection
@section('leftside')
@include('layouts.sidebarCustomer')
@endsection
@extends('layouts.templateMaster')
@section('content')
<style>
    #map-canvas{
    width:100%;
    height:300px;
    }
</style>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAafgoWn7nSfw4o5ctci8yvyWOQmAD93g4&libraries=places"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ADD NEW CUSTOMER
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">
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
                        <i class="material-icons">book</i>
                        </span>                       
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Nama Customer" name="name" />
                        </div>
                    </div>
                    <div class="input-group" >
                        <label for="">Image </label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col s12">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" id="searchmap" placeholder="Cari Lokasi">
                        <div id="map-canvas"></div>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <label for="">Latitude</label>
                        <input class="form-control" id="lat" type="text" name="latitude" placeholder="latitude"required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Longitude</label>
                        <input class="form-control" id="lng" type="text" name="longitude" placeholder="longitude" class="validate" required>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                    </div>
                    <div class="form-group">
                        <button type="Submit" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal">
                        <i style="color:#fff" class="material-icons">save</i>
                        <span>SAVE</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map-canvas')
        ,{
            center:{
                lat: 0,
                lng:0
            },
            zoom:15
        }
        );
        infoWindow = new google.maps.InfoWindow;
    
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };
    
    
        marker.setPosition(pos);
        infoWindow.setContent('Location found.');
        infoWindow.open(map);
        map.setCenter(pos);
    }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
    });
    } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
    }
    var marker = new google.maps.Marker({
        position: {
                lat:0,
                lng:0
            },
            map: map,
            draggable:true
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
<script src="{{ asset('assets/js/gmaps.js')}}"></script>
@endsection