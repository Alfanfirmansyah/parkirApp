<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $user= User::where('role_id',1)->get();
        return view('admin.user.data_user',compact('user'));
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

         $imageName = time().'.'.$request->foto->getClientOriginalExtension();
         $request->foto->move(public_path('images'), $imageName);

          $user = new User([
          'name'    => $request->get('name'),
          'password' => Hash::make($request->get('password')),
          'email'   => $request->get('email'),
          'address' => $request->get('address'),
          'telp'    => $request->get('telp'),
          'foto'    => $imageName,
          'role_id' => 1,
          'customer_id' =>0
          ]);
          $user->save();
          return redirect('/admin')->with('success','Berhasil Menambah Data');
    
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
        return view('admin.user.edit_user',compact('user'));
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
