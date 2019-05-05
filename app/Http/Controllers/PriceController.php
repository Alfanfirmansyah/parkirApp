<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\Kategori;
use DB;
use \Auth;
use Illuminate\Support\Facades\Session;

class PriceController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$id = \Auth::user()->id;
        $kategori= Kategori::all();
        $price= Pricing::where('user_id', '=',[$id])->get();
        return view('operator.pricing.data_price',compact('kategori','price'));
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
        $request->validate([
            'kategori_id'   =>'required',
            'harga'         =>'required'
 
        ]);
        
        $key = $request->get('customer_id');
          $price = new Pricing([
          'kategori_id'   => $request->get('kategori_id'),
          'harga'         => $request->get('harga'),
          'customer_id'   => $request->get('customer_id'),
          ]);
          $price->save();          
          return redirect('/customer/'.$key)->with('success','Berhasil Menambah Data');
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
        $kategori = Kategori::all();
		$price    = Pricing::find($id);
        return view('admin.pricing.edit_price',compact('kategori','price'));
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
          $request->validate([
            'kategori_id'   =>'required',
            'harga'         =>'required'
 
        ]);
   
        $price = Pricing::find($id);
        $key = $price->customer_id;
        $price->kategori_id = $request->get('kategori_id');
        $price->harga       = $request->get('harga');
        $price->save();
        return redirect('/customer/'.$key)->with('success', 'Data kategori Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
       $price = Pricing::find($id);
       $key = $price->customer_id;
       $price->delete();
       return redirect('/customer/'.$key)->with('success', 'Data kategori Berhasil Dihapus');
    }
}
