<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
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
		$place = Place::where('id_user', '=',[$id])->get();
		
		if(!$place->isEmpty()){
			return view('welcomeOPscan', compact('tgl'));
		}else{
			return view('welcomeOP', compact('tgl'));
		}    
	}
}
