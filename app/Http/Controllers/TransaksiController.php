<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Pricing;
use App\Transaksi;
use App\Customer;
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
        $id = \Auth::user()->id_customer;
         $request->validate([
            'no_plat'     =>'required',
            'harga'       =>'required',
        ]);
       
          $qrcode = $request->get('qrcode');
          $customer = Customer::where('id_customer', auth()->user()->id_customer )
          ->select('nama_customer')
          ->get();

          $Transaksi = new Transaksi([
          'kode_qrcode'     => $qrcode,
          'no_plat'         => $request->get('no_plat'),
          'harga'     	    => $request->get('harga'),
          'tgl_keluar'      => '',
          'id_customer'     => $id,
          'status'          => 'masuk',
          ]);
          $Transaksi->save();

          $trs = Transaksi::where('kode_qrcode', $qrcode )
          ->select('tgl_masuk','no_plat','harga','kode_qrcode')
          ->get();

          $tiket = QrCode::size(220)->generate($qrcode);
           
          return view('operator.transaksi.tiket',compact('tiket','trs','customer'));
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
