<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use DB;
use \Auth;
use Illuminate\Support\Facades\Session;



class PlaceController extends Controller
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
        return view('operator.place.Dataplace',compact('place'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.place.CreatePlace');
        
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
            'nama_place'     =>'required',
            'address'        =>'required',
            'latitude'       =>'required',
            'longitude'      =>'required',
            'id_user'        =>'required',
            'filename'       =>'required',
            'status'         =>'required',
            'filename.*'     =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);
       
	    if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images', $name);  
                $data[] = $name;  
            }
        }
		
          $place = new Place([
          'id_user'         => $request->get('id_user'),
          'nama_place'      => $request->get('nama_place'),
          'address'         => $request->get('address'),
          'latitude'        => $request->get('latitude'),
          'longitude'       => $request->get('longitude'),
          'status'          => $request->get('status'),
          'img'             => json_encode($data)
          ]);
          $place->save();
          return redirect('/place')->with('success','Berhasil Menambah Data');
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
        return view('operator.place.EditPlace',compact('place'));
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
            'nama_place'     =>'required',
            'address'        =>'required',
            'latitude'       =>'required',
            'longitude'      =>'required',
           
        ]);
                $place = Place::find($id);
                if(empty($request->img)){
                    $place->nama_place  = $request->get('nama_place');
                    $place->address     = $request->get('address');
                    $place->latitude    = $request->get('latitude');
                    $place->longitude   = $request->get('longitude');
                    $place->save();
                    return redirect('/place')->with('success', 'Data place Berhasil Terupdate');       
                } else {       
                   	if($request->hasfile('filename'))
                    {
                        foreach($request->file('filename') as $image)
                        {
                            $name=$image->getClientOriginalName();
                            $image->move(public_path().'/images', $name);  
                            $data[] = $name;  
                        }
                    }

                    $place->nama_place  = $request->get('nama_place');
                    $place->address     = $request->get('address');
                    $place->latitude    = $request->get('latitude');
                    $place->longitude   = $request->get('longitude');
                    $place->img         = json_encode($data);
                    $place->save();
                    return redirect('/place')->with('success', 'Data place Berhasil Terupdate');
                }                     
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
        return redirect('/place')->with('success', 'Data place Berhasil Dihapus');
    }
}
