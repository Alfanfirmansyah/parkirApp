@section('title')
<title>Data Transaksi Parkir | Page</title>
@endsection
@section('leftside')
<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <a href="{{ url('operator')}}">
            <i class="material-icons">dashboard</i>
            <span>Manage Parking</span>
            </a>
        </li>
        <li>
            <a href="/transaksi">
            <i class="material-icons">subject</i>
            <span>Data Parkir</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->
@endsection
@extends('layouts.templateOPMaster')
@section('content')
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-indigo">
        <div class="icon">
            <i class="material-icons">event</i>
        </div>
        <div class="content">
            <div class="text">DATE NOW</div>
            <div class="">{{ $tgl }}</div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-red">
        <div class="icon">
            <i class="material-icons">local_parking</i>
        </div>
        <div class="content">
            <div class="text">TEMPAT PARKING</div>
            <div class="">{{ auth()->user()->customer['name'] }}
                        
            </div>
        </div>
    </div>
</div>
<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12">
        @if(session()->get('success'))
        <div class="alert alert-success alert-close alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session()->get('success') }}  
        </div>
        <br />
        @elseif(session()->get('danger'))
        <div class="alert alert-danger alert-close alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session()->get('danger') }}  
        </div>
        <br />
        @endif
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h2>
                        SCAN QR CODE
                    </h2>
                </div>
                <div class="body">
                    <form method="post" action="/checkout_parking" enctype="multipart/form-data">
                        @csrf
                        <b>Device has camera: </b>
                        <span id="cam-has-camera"></span>
                        <br>
                        <video style="width:100%;" muted playsinline id="qr-video"></video>
                        <b>Detected QR code: </b>
                        <textarea class="btn btn-primary btn-sm" id="cam-qr-result" required="required" name="qrcode" required style="border:none;height:24px; outline:none; resize:none; overflow:hidden;"></textarea>
                        <div class="form-group">
                            <button type="Submit" class="btn btn-danger">
                            <i style="color:#fff" class="material-icons">airplay</i>
                            <span>Check Out</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h2>
                        PARKING
                    </h2>
                </div>
                <div class="body">
                    <form method="post" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" autocomplete="off" required placeholder="No-Plat" name="no_plat" />
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">category</i>
                            </span>
                            <select class="form-control show-tick" required name="kategori" id="kategori">
                                <option value="">- Select Jenis Kendaraan- </option>
                                @foreach($price as $row)
                                <option value="{{ $row->get_kategori->kategori_id }} - {{ $row->harga }}">{{ $row->get_kategori->kendaraan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
                        <!--<script type="text/javascript">
                            jQuery(document).ready(function ()
                            {
                                    jQuery('select[name="kat"]').on('change',function(){
                                       var katID = jQuery(this).val();
                                       if(katID)
                                       {
                                          jQuery.ajax({
                                             url : '/operator/getHarga/' +katID,
                                             type : "GET",
                                             dataType : "json",
                                             success:function(data)
                                             {
                                                console.log(data);
                                                jQuery.each(data, function(key,value){
                                                   $('select[name="parking"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                             }
                                          });
                                       }
                                       else
                                       {
                                          $('select[name="parking"]').empty();
                                       }
                                    });
                            });
                            </script> -->
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">date_range</i>
                            </span>
                            <?php $kode = 'TR-'.date('his');?>
                            <div class="form-line">
                                <input type="text" readonly class="form-control" value="{{ $tgl }}" name="" />
                                <input type="hidden" readonly class="form-control" value="{{ $kode }}" name="qrcode" />
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="Submit" class="btn btn-info waves-effect" data-toggle="modal" data-target="#defaultModal">
                            <i style="color:#fff" class="material-icons">save</i>
                            <span>Check In</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module">
    import QrScanner from "/assets/data_scanner/qr-scanner.min.js";
    QrScanner.WORKER_PATH = '/assets/data_scanner/qr-scanner-worker.min.js';
    const video = document.getElementById('qr-video');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camQrResult = document.getElementById('cam-qr-result');
    const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
    const fileSelector = document.getElementById('file-selector');
    const fileQrResult = document.getElementById('file-qr-result');
    
    function setResult(label, result) {
    	label.textContent = result;
    	camQrResultTimestamp.textContent = new Date().toString();
    	label.style.color = 'teal';
    	clearTimeout(label.highlightTimeout);
    	label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
    }
    
    // ####### Web Cam Scanning #######
    
    QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);
    
    const scanner = new QrScanner(video, result => setResult(camQrResult, result));
    scanner.start();
    
    document.getElementById('inversion-mode-select').addEventListener('change', event => {
    	scanner.setInversionMode(event.target.value);
    });
    
    // ####### File Scanning #######
    
    fileSelector.addEventListener('change', event => {
    	const file = fileSelector.files[0];
    	if (!file) {
    		return;
    	}
    	QrScanner.scanImage(file)
    		.then(result => setResult(fileQrResult, result))
    		.catch(e => setResult(fileQrResult, e || 'No QR code found.'));
    });
    
</script>	
@endsection