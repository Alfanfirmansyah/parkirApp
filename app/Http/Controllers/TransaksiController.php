<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Pricing;
use App\Transaksi;
use DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use \Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = \Auth::user()->id;
         $request->validate([
            'no_plat'     =>'required',
            'id_price'  =>'required',
            'tgl_masuk'   =>'required',
        ]);
       
          $qrcode = $request->get('qrcode');
        
          $Transaksi = new Transaksi([
          'kode_qrcode'     => $qrcode,
          'no_plat'         => $request->get('no_plat'),
          'id_pricing'        => $request->get('id_price'),
          'tgl_masuk'       => $request->get('tgl_masuk'),
          'tgl_keluar'       =>'',
          'id_user'         => $id,
          'status'          => 'masuk',
          ]);
          $Transaksi->save();

          $tiket = QrCode::size(500)->generate($qrcode);

          $kode = $qrcode;
          $no_plat = $request->get('no_plat');
          $tgl_masuk = $request->get('tgl_masuk');
          $harga = $request->get('id_price');  
          $price= Pricing::where('id_user', '=',[$id])
                            ->where('id_price','=',[$harga])
                            ->get();
           
          return view('operator.transaksi.tiket',compact('tiket','kode','no_plat','tgl_masuk','price'));
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
