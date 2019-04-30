<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Pricing;
use \Auth;

class OperatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$id = \Auth::user()->id;
        $tgl = date('l, d-m-Y');
        $tgl2 = date('d-m-Y H:i');
        $price = Pricing::join('kategori', 'pricing.id_kategori' ,'=', 'kategori.id_kategori')
						->join('customer', 'pricing.id_customer' ,'=', 'customer.id_customer')
						->select('kategori.*','pricing.harga')
						->get();
		$customer = Customer::where('id_customer', auth()->user()->id_customer )
						->select('nama_customer')
						->get();
		return view('welcomeOPscan', compact('tgl','tgl2','price','customer'));
    }

    public function profil()
    {
        $operator = User::where('id',auth()->user()->id )->get();
        return view('operator.profile.DataProfile',compact('operator'));
    }

    public function edit($id)
    {
        $operator = User::find($id);
        return view('operator.profile.DataProfile',compact('operator'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      =>'required',
            'email'     =>'required',
            'address'   =>'required',
            'telp'      =>'required' 
        ]);
   
        $operator = User::find($id);
        $operator->name     = $request->get('name');
        $operator->email    = $request->get('email');
        $operator->address  = $request->get('address');
        $operator->telp     = $request->get('telp');
        $operator->save();
        return redirect('http://localhost:8000/operator/2/edit')->with('success', 'Data operator Berhasil Terupdate');              
    }

    public function UpdatePass(Request $request, $id)
    {
      
        $request->validate([
            'password' => 'required|string|min:6|different:current_password|confirmed',

        ]);
        $operator = User::find($id);
        $operator->password = Hash::make($request->input('password'));
        $operator->save();
        return redirect('http://localhost:8000/operator/2/edit')->with('success', 'Data operator Berhasil Terupdate');              
    }
}
