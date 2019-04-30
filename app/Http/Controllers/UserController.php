<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use \Auth;
use Illuminate\Support\Facades\Session;



class UserController extends Controller
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
        $user= User::where('id_role',1)->get();
        return view('admin.user.Datauser',compact('user'));
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
            'telp'      =>'required' 
        ]);

          $user = new User([
          'name'    => $request->get('name'),
          'password' => Hash::make('password'),
          'email'   => $request->get('email'),
          'address' => $request->get('address'),
          'telp'    => $request->get('telp'),
          'id_role' => 1,
          'id_customer' =>0
          ]);
          $user->save();
          return redirect('/user')->with('success','Berhasil Menambah Data');
    
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
        return view('admin.user.EditUser',compact('user'));
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
            'email'     =>'required',
            'address'   =>'required',
            'telp'      =>'required' 
        ]);
   
        $user = User::find($id);
        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $user->telp     = $request->get('telp');
        $user->address  = $request->get('address');
        $user->save();
        return redirect('/user')->with('success', 'Data user Berhasil Terupdate');              
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
        return redirect('/user')->with('success', 'Data user Berhasil Dihapus');
    }
}
