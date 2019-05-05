<?php

namespace App\Http\Controllers;
use App\Model\Customer;
use App\Model\User;
use App\Model\Transaksi;
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
        $user       = User::where('role_id','2')->count();
        return view('welcome',compact('tgl','customer','user','keluar'));
    }
}
