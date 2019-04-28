<?php

namespace App\Http\Controllers;

use App\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role= Role::all();
        return view('admin.role.DataRole',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'role'         =>'required'
 
        ]);
        
          $role = new role([
          'role'   => $request->get('role'),
          ]);
          $role->save();
          return redirect('/role')->with('success','Berhasil Menambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = role::find($id);
        return view('admin.role.EditRole',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role'   =>'required',
        ]);
   
        $role = Role::find($id);
        $role->role     = $request->get('role');
        $role->save();
        return redirect('/role')->with('success', 'Data role Berhasil Terupdate');
                  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/role')->with('success', 'Data role Berhasil Dihapus');
    }
}
