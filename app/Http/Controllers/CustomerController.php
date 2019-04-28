<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use DB;
use \Auth;
use Illuminate\Support\Facades\Session;



class CustomerController extends Controller
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
    public function index(Request $request)
    {
        $place= Place::all();
        return view('admin.place.DataCustomer',compact('place'));
        
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
        $place = Place::find($id);
        return view('admin.place.EditCustomer',compact('place'));
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
            'status'     =>'required'
        ]);
        
        $place = Place::find($id);
        $place->status  = $request->get('status');
        $place->save();
        return redirect('/customer')->with('success', 'Data place Berhasil Terupdate');
                                     
    }
	
    /** 
     * Remove the specified resou   rce from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();
        return redirect('/customer')->with('success', 'Data place Berhasil Dihapus');
    }
}
