<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Pricing;
use \Auth;
use Illuminate\Support\Facades\DB;

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
        $id     = \Auth::user()->customer_id;
        $tgl    = date('l, d-m-Y');
        $price  = Pricing::with('get_kategori')->where('customer_id', $id)->get();
		return view('welcomeOPscan', compact('tgl','price'));
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



