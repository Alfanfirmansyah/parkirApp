@extends('layouts.templateTiket')
@section('content')  
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <i class="fa fa-ticket"></i>  Tiket Parking
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                    @if(session()->get('success'))
                                    <div class="alert alert-success alert-close">
                                        {{ session()->get('success') }}  
                                    </div><br />
                                    @endif
							
				
                <!-- With Captions -->
                <div class="col-lg-12">
                        <div class="body">
						<div class="col-md-12">
					
						{!! $tiket !!}
                       kode transaksi {{ $kode }}<br>
                       no plat {{ $no_plat }} <br>
                       jam {{ $tgl_masuk }} <br>
                       @foreach ($price as $r)
                        harga  Rp {{ number_format($r->harga,0) }}
                       @endforeach
                        </div>
						</div>
                </div>
          
                           </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

@endsection

