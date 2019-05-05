<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Pricing;
use App\Models\Kategori;
use \Auth;
use Illuminate\Support\Facades\Session;



class CustomerController extends Controller
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
        $customer= Customer::all();
        return view('admin.customer.data_customer',compact('customer'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $tgl = date('l, d-m-Y');
        return view('admin.customer.create_customer',compact('tgl'));
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
            'name' 			 =>'required',
            'address'        =>'required',
            'latitude'       =>'required',
            'longitude'      =>'required',
            'filename'       =>'required',
            'filename.*'     =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);
    
        
	    if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images', $name);  
                $data[] = $name;  
            }
        }
		
          $customer = new Customer([
          'name' 		    => $request->get('name'),
          'address'         => $request->get('address'),
          'latitude'        => $request->get('latitude'),
          'longitude'       => $request->get('longitude'),
          'image'           => json_encode($data)
          ]);
          $customer->save();
          return redirect('/customer')->with('success','Berhasil Menambah Data');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer   = Customer::find($id);
		$price      = Pricing::where('customer_id', '=',[$id])->get();
		$userop     = User::where('role_id',2)->where('customer_id',$id)->get();
		$kategori   = Kategori::all();
        return view('admin.customer.detail_customer',compact('customer','price','kategori','userop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit_customer',compact('customer'));
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
                'name'    		 =>'required',
                'address'        =>'required',
                'latitude'       =>'required',
                'longitude'      =>'required',
                
            ]);
                $customer = Customer::find($id);
                $customer->name 		    = $request->get('name');
                $customer->address          = $request->get('address');
                $customer->latitude         = $request->get('latitude');
                $customer->longitude        = $request->get('longitude');
                $customer->save();
                return redirect('/customer')->with('success', 'Data customer Berhasil Terupdate');                     
    }
    public function updateImg(Request $request, $id)
    {
       $request->validate([
            'filename'     =>'required',
        ]);
                  $customer = Customer::find($id);
                   	if($request->hasfile('filename'))
                    {
                        foreach($request->file('filename') as $image)
                        {
                            $name=$image->getClientOriginalName();
                            $image->move(public_path().'/images', $name);  
                            $data[] = $name;  
                        }
                    }
                    $customer->image        = json_encode($data);
                    $customer->save();
                    return redirect('/customer/'.$id.'/edit')->with('success', 'Data customer Berhasil Terupdate');                
    }
    /** 
     * Remove the specified resou   rce from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer')->with('success', 'Data customer Berhasil Dihapus');
    }
}
