<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pricing;
use App\Kategori;
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
        $price= Pricing::where('id_user', '=',[$id])->get();
        return view('operator.pricing.DataPrice',compact('kategori','price'));
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
            'id_kategori'         =>'required',
            'harga'         =>'required'
 
        ]);
        
          $price = new Pricing([
          'id_kategori'   => $request->get('id_kategori'),
          'harga'   => $request->get('harga'),
          'id_user'   => $request->get('id_user'),
          ]);
          $price->save();
          return redirect('/customer')->with('success','Berhasil Menambah Data');
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
        return view('admin.pricing.EditPrice',compact('kategori','price'));
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
            'id_kategori'         =>'required',
            'harga'         =>'required'
 
        ]);
   
        $price = Pricing::find($id);
        $price->id_kategori     = $request->get('id_kategori');
        $price->harga     = $request->get('harga');
        $price->save();
        return redirect('/customer')->with('success', 'Data kategori Berhasil Terupdate');
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
       $price->delete();
       return redirect('/customer')->with('success', 'Data kategori Berhasil Dihapus');
    }
}
