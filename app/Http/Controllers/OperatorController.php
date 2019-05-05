<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\User;
use App\Model\Pricing;
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
        $price = Pricing::join('kategori', 'pricing.kategori_id' ,'=', 'kategori.id')
						->join('customer', 'pricing.customer_id' ,'=', 'customer.id')
						->where('customer.id', '=' ,auth()->user()->customer_id)
						->select('kategori.*','pricing.*')
						->get();
		return view('welcomeOPscan', compact('tgl','tgl2','price'));
    }

    public function profil()
    {
        $operator = User::where('id',auth()->user()->id )->get();
        return view('operator.profile.dataProfile',compact('operator'));
    }

    public function edit($id)
    {
        $operator = User::find($id);
        return view('operator.profile.dataProfile',compact('operator'));
    }

}
