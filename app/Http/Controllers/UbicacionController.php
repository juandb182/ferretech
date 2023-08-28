<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table("ferre3s")->paginate(10);
        /* $products->paginate(15) */
        /* dd($products); */

        $user = Auth::user();



        return view('ubicacion.index', compact("products","user"));
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
        /*   
        dd($search_text,$search_order); */

        if ($search_order == 'sede') {
            return redirect('/ubicacion')->with('danger','Debe seleccionar alguna sede.');
        }
        
        if (!empty($search_text)) {
            session(['last_search' => $search_text]);
        }


        //boton asc y desc para el codigo

        if ($search_text == " " || $search_text == null || $search_text == "null") {
            return redirect('/ubicacion');
        }

        if ($search_text == " " || $search_text == null || $search_text == "null" && $search_order != null) {
            return redirect('/ubicacion')->with('danger','Debe ingresar un pasillo.');
        }


        if ($search_order == 'FV1' && strlen($search_text) == 3) {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre1s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('UBICACION', 'LIKE', "%$term%");
                       
                });
            }

            $products = $query->orderBy('UBICACION', 'ASC')
                ->paginate(100000);
            return view('ubicacion.index', compact('products', 'user'));
        }


        if ($search_order == 'FV1') {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre1s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('UBICACION', 'LIKE', "%$term%");
                       
                });
            }

            $products = $query->orderBy('EXISTENCIA', 'DESC')
                ->paginate(100000);
            return view('ubicacion.index', compact('products', 'user'));
        }

      

        if ($search_order == 'FV3'  && strlen($search_text) == 3) {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre3s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('UBICACION', 'LIKE', "%$term%");
                       
                });
            }

            $products = $query->orderBy('UBICACION', 'ASC')
                ->paginate(100000);
            return view('ubicacion.index', compact('products', 'user'));
        }





        if ($search_order == 'FV3') {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre3s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('UBICACION', 'LIKE', "%$term%");
                       
                });
            }

            $products = $query->orderBy('EXISTENCIA', 'DESC')
                ->paginate(100000);
            return view('ubicacion.index', compact('products', 'user'));
        }












    }



}
