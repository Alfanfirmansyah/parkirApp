<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
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
		$place = Place::where('id_user', '=',[$id])->get();
        $price = Pricing::join('kategori', 'pricing.id_kategori' ,'=', 'kategori.id_kategori')
						->select('kategori.*','pricing.*')
						->where('pricing.id_user', '=' ,[$id])
						->get();
        

        
		if(!$place->isEmpty()){
			return view('welcomeOPscan', compact('tgl','tgl2','price'));
		}else{
			return view('welcomeOP', compact('tgl'));
		}    
	}
}
