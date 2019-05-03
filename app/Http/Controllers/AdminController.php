<?php

namespace App\Http\Controllers;
use App\Customer;
use App\User;
use App\Transaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $tgl = date('l, d-m-Y');
        $customer   = Customer::count();
        $keluar     = Transaksi::where('status','keluar')->count();
        $user       = User::where('id_role','2')->count();
        return view('welcome',compact('tgl','customer','user','keluar'));
    }
}
