<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\Transaksi;
use App\Models\Customer;
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
        $id = \Auth::user()->customer_id;
        $transaksi  = Transaksi::with('get_kategori')->where('status','masuk')
                    ->where('customer_id',$id)->get();
        $keluar     = Transaksi::with('get_kategori')->where('status','keluar')
                    ->where('customer_id',$id)->get();
        return view('operator.transaksi.data_transaksi',compact('transaksi','keluar'));
        
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
        $id = \Auth::user()->customer_id;
         $request->validate([
            'no_plat'     =>'required',
            'kategori'    =>'required',
        ]);
       
          $qrcode = $request->get('qrcode');
          $Transaksi = new Transaksi([
          'kode_qrcode'     => $qrcode,
          'no_plat'         => $request->get('no_plat'),
          'kategori_id'     => substr($request->get('kategori'),0,1),
          'harga'     	    => substr($request->get('kategori'),3,5),
          'tgl_keluar'      => '',
          'customer_id'     => $id,
          'status'          => 'masuk',
          ]);
          $Transaksi->save();
          $transaksi = Transaksi::where('kode_qrcode', $qrcode )->get();
          $qrcode    = QrCode::size(250)->generate($qrcode);
          return view('operator.transaksi.tiket',compact('qrcode','transaksi')); 
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

    public function checkout(Request $request){
        $qrcode = $request->get('qrcode');
        $transaksi = Transaksi::where('kode_qrcode', $qrcode)->first();

        if(empty($transaksi)){

             return redirect('/operator')->with('danger', 'Gagal melakukan proses, kode parkir tidak tersedia'); 

        }else{
             $transaksi->status = 'keluar';
             $transaksi->tgl_keluar = date('Y-m-d h:i:s');
             $transaksi->save();
             $checkout = Transaksi::where('kode_qrcode', $qrcode )->get();
             $qrcode   = QrCode::size(250)->generate($qrcode);
             return view('operator.transaksi.checkout',compact('qrcode','checkout')); 
        }
      
    }

    // public function getHarga($id) 
    // {        
    //     $harga = DB::table("pricing")->where("pricing_id",$id)->pluck("harga","harga");
    //     return json_encode($harga);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->delete();
        return redirect('/transaksi')->with('success', 'Data transaksi Berhasil Dihapus');
    }
}
