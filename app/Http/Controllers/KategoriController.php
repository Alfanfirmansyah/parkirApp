<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kategori;
use DB;
use \Auth;
use Illuminate\Support\Facades\Session;



class KategoriController extends Controller
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
        $kategori= Kategori::all();
        return view('admin.kategori.dataKategori',compact('kategori'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
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
            'kendaraan'         =>'required'
 
        ]);
        
          $kategori = new Kategori([
          'kendaraan'   => $request->get('kendaraan'),
          ]);
          $kategori->save();
          return redirect('/kategori')->with('success','Berhasil Menambah Data');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.editkategori',compact('kategori'));
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
            'kendaraan'   =>'required',
        ]);
   
        $kategori = Kategori::find($id);
        $kategori->kendaraan     = $request->get('kendaraan');
        $kategori->save();
        return redirect('/kategori')->with('success', 'Data kategori Berhasil Terupdate');              
    }
	
    /** 
     * Remove the specified resou   rce from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori')->with('success', 'Data kategori Berhasil Dihapus');
    }
}
