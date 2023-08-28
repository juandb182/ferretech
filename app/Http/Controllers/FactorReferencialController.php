<?php

namespace App\Http\Controllers;

use App\Models\FactorReferencial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FactorReferencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $factores = DB::table('factor_referencials')->latest()->limit(1)->get();
        return view('factorReferencial.Index',compact("factores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $factor = DB::table('factor_referencials')->latest()->limit(1)->get();
       
        return view("factorReferencial.create",compact("factor"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $factor = new FactorReferencial();
        $factor->FactorReferencial = $request->input("FactorReferencial");
        $factor->auth_user = Auth::user()->name;
        $factor->save();



        return redirect('/factor_ref')->with('success','Factor referencial actualizado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
/* 
        $factor = FactorReferencial::find($id);

      


        return view('factorReferencial.edit',compact('factor')); */
    
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
        
/* 
        $factor = FactorReferencial::findOrFail($id);

        $data = $request->only('FactorReferencial');

        
       

        $factor->save($data);


        return redirect('/factor_ref')->with('success','Factor referencial actualizado exitosamente.'); */




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


   
}
