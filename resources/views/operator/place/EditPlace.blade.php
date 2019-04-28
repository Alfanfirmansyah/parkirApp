@extends('layouts.templateOPMaster')
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
                    Edit Data Parking Place
                </h2>
            </div>
            <div class="body">
               <form method="post" action="{{ route('place.update',$place->id_customer) }}" enctype="multipart/form-data">
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
                         <i class="material-icons">person_pin_circle</i>
                         </span>
                         <div class="form-line">
                            <input type="text" name="nama_place" class="form-control" value="{{$place->nama_place}}">
                        </div>
                    </div>
                       <div class="input-group">
                         <span class="input-group-addon">
                         <i class="material-icons">place</i>
                         </span>
                         <div class="form-line">
                            <input type="text" name="address" class="form-control" value="{{$place->address}}">
                        </div>
                    </div>
                    <div class="input-group control-group increment" >
                        <input type="file" name="filename[]" class="form-control">
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
                    <div class="col s12">
                        <input type="text" class="form-control" id="searchmap" placeholder="Cari Lokasi">
                        <div id="map-canvas"></div>
                    </div><br>
                    <div class="col-md-6">
                        <label for="">Latitude</label>
                        <input class="form-control" id="lat" type="text" name="latitude" value="{{$place->latitude}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Longitude</label>
                        <input class="form-control" id="lng" type="text" name="longitude" value="{{$place->longitude}}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
@endsection                           
