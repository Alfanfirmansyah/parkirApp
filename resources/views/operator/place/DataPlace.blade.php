@extends('layouts.templateOPMaster')
@section('content')  
<style>
#map-canvas{
   width:100%;
   height:300px;
}
</style>
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAafgoWn7nSfw4o5ctci8yvyWOQmAD93g4&libraries=places"></script>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Parking Place
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                    @if(session()->get('success'))
                                    <div class="alert alert-success alert-close">
                                        {{ session()->get('success') }}  
                                    </div><br />
                                    @endif
							
				@foreach($place as $row)
                <!-- With Captions -->
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                  
                        <div class="header">
                            <h2><i class="fa fa-bus"></i> {{ $row->nama_place }}</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">   
									 <?php 
                                            if($row->status == 'Belum diverifikasi') {?>
                                            <button style="font-size:87%" class="btn btn-danger btn-sm">{{$row->status}}</button>
                                            <?php } else if($row->status== 'Terverifikasi') {?>
                                            <button style="font-size:87%" class="btn btn-success btn-sm">{{$row->status}}</button>
                                            <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
						<div class="col-md-6">
                            <div id="carousel-example-generic_{{$row->id_customer}}" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
									<?php $a = 0 ?>
									<?php foreach (json_decode($row->img)as $gambar) { ?>
                                    <li data-target="#carousel-example-generic_{{$row->id}}" data-slide-to="$a++" class=""></li>	
									<?php } ?>
							   </ol>
                                <!-- Wrapper for slides -->
								
                                <div class="carousel-inner" role="listbox">
									<div class="item active">
                                       <img style="width:100%; height:320px" src="{{ asset('/images/'.array_first(json_decode($row->img))) }}" />
                                    </div>
									<?php foreach (json_decode($row->img)as $gambar) { ?>									
										<div class="item">
											<img style="width:100%; height:320px" src="{{ asset('/images/'.$gambar) }}">
										</div>
									<?php } ?>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_{{$row->id_customer}}" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_{{$row->id_customer}}" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
							
							<br>
								<p><i class="fa fa-map-marker"></i> {{$row->address}}</p>
								
								
								
							
                        </div>
						<div class="col-md-6">
							<i class="fa fa-map-o"></i> Map Location
							<div id="map-canvas"></div>
								<div class="col-md-6">
								<label for="">Lat</label>
								<input class="form-control" id="lat" type="text" style="border:none" readonly value="{{$row->latitude}}">
							</div>
							<div class="col-md-6">
								<label for="">Lng</label>
								<input class="form-control" id="lng" type="text"style="border:none" readonly value="{{$row->longitude}}">
							</div>
							<div style="float:right">
											<a href="{{ route('place.edit',$row->id_customer)}}">
                                                    <button class="btn btn-icon btn-sm btn-info" type="button" style="margin-top:4%">
                                                    <i style="color:#fff" class="material-icons">border_color</i>
                                                    <span>Update</span>
                                                    </button>
                                                </a><br><br>
							  <form action="{{ route('place.destroy', $row->id_customer)}}" method="post">
                                                @csrf
												
												
                                                @method('DELETE')
                                                <a onclick="return confirm('Are you sure?')">
                                                    <button class="btn btn-icon btn-sm btn-danger" type="submit">
                                                    <i style="color:#fff" class="material-icons">delete</i>
                                                    <span>Delete &nbsp </span>
                                                    </button>
                                                </a>
                                                </form>
                                            
                                               
							</div>
						</div>
						
                    </div>
                </div>
				<script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map-canvas')
        ,{
            center:{
                lat:<?php echo $row->latitude?>,
                 lng:<?php echo $row->longitude?>
            },
            zoom:15
        }
        );
        infoWindow = new google.maps.InfoWindow;
    
    var marker = new google.maps.Marker({
        position: {
                lat:<?php echo $row->latitude?>,
                lng:<?php echo $row->longitude?>
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
                <!-- #END# With Captions -->
                @endforeach
                           </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

@endsection

