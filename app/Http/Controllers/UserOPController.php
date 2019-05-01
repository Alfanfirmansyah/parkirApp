<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use \Auth;
use Illuminate\Support\Facades\Session;



class UserOPController extends Controller
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
            'name'      =>'required',
            'email'     =>'required',
            'password'  =>'required',
            'address'   =>'required',
            'telp'      =>'required',
            'foto'      =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $imageName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('images'), $imageName);
        
        $user = new User([
          'name'    => $request->get('name'),
          'password' => Hash::make($request->get('password')),
          'email'   => $request->get('email'),
          'address' => $request->get('address'),
          'telp'    => $request->get('telp'),
          'foto'    => $imageName,
          'id_role' => 2,
          'id_customer' => $request->get('id_customer')
          ]);
          $user->save();
          return redirect('/customer')->with('success2','Berhasil Menambah Data');
    
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
        $user = User::find($id);
        return view('admin.userop.EditOperator',compact('user'));
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
            'name'      =>'required',
            'password'  =>'required',
            'email'     =>'required',
            'address'   =>'required',
            'telp'      =>'required' 
        ]);
        
        
        
        $user = User::find($id);
        if(empty($request->foto)){
            $user = User::find($id);
            $user->name     = $request->get('name');
            $user->password = Hash::make($request->get('password'));
            $user->email    = $request->get('email');
            $user->telp     = $request->get('telp');
            $user->address  = $request->get('address');
            $user->save();
        } else {
            $imageName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('images'), $imageName);
            $user = User::find($id);
            $user->name     = $request->get('name');
            $user->password = Hash::make($request->get('password'));
            $user->email    = $request->get('email');
            $user->telp     = $request->get('telp');
            $user->address  = $request->get('address');
            $user->foto     = $imageName;
            $user->save();
        }
        return redirect('/customer')->with('success2', 'Data user Berhasil Terupdate');           
    }
	
    /** 
     * Remove the specified resou   rce from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/customer')->with('success', 'Data user Berhasil Dihapus');
    }
}
