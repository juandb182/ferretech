<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ConsultaFerreventeGeneral extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $products = null;

        return view('ferreventeGeneral.fvGeneral',compact('products','user'));
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
        //
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
        //
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
        //
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


    public function search(Request $request)
    {

 $user = Auth::user();

        $search_text = $request->query('query');
        $search_order = $request->query('order');
       

        

        //boton asc y desc para el codigo

        $products = DB::table('ferre1s')
                ->where('CODIGO', $search_text)
                ->select('id', 'CODIGO', 'PRODUCTO','PRECIO','EXISTENCIA','COSTO','UBICACION', DB::raw("'ferre1s' as tabla"))
                ->union(DB::table('ferre3s')
                        ->where('CODIGO', $search_text)
                        ->select('id', 'CODIGO', 'PRODUCTO','PRECIO','EXISTENCIA','COSTO','UBICACION', DB::raw("'ferre3s' as tabla")))
                ->get();

                

        return view('ferreventeGeneral.fvGeneral', compact('products','user'));

    }


}
