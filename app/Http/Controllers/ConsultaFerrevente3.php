<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ConsultaFerrevente3 extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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



        return view('ferrevente3.fv3', compact("products","user"));
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
        
        if (!empty($search_text)) {
            session(['last_search' => $search_text]);
        }



        //boton asc y desc para el codigo

        if ($search_text == " " || $search_text == null || $search_text == "null") {
            return redirect('/fv3');
        }


        if ($search_text == null && $search_order == "ASC") {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre3s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('PRODUCTO', 'LIKE', "%$term%")
                        ->orWhere('CODIGO', 'LIKE', "%$term%");
                });
            }
            $products = $query->orderBy('EXISTENCIA', 'ASC')
                ->paginate(100000);
            return view('ferrevente3.fv3', compact('products','user'));

        } elseif ($search_text == null && $search_order == "DESC") {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre3s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('PRODUCTO', 'LIKE', "%$term%")
                        ->orWhere('CODIGO', 'LIKE', "%$term%");
                });
            }
            $products = $query->orderBy('EXISTENCIA', 'DESC')
                ->paginate(100000);
            return view('ferrevente3.fv3', compact('products','user'));
        }

        //codigo y texto

        if ($search_text == " " || $search_text == null) {
            return redirect('/fv3');
        } elseif ($search_text != null && $search_order == "ASC") {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre3s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('PRODUCTO', 'LIKE', "%$term%")
                        ->orWhere('CODIGO', 'LIKE', "%$term%");
                });
            }
            $products = $query->orderBy('EXISTENCIA', 'ASC')
                ->paginate(100000);
                return view('ferrevente3.fv3', compact('products','user'));
            /*    dd($products); */
        } elseif ($search_text != null && $search_order == "DESC") {
            $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre3s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('PRODUCTO', 'LIKE', "%$term%")
                        ->orWhere('CODIGO', 'LIKE', "%$term%");
                });
            }
            $products = $query->orderBy('EXISTENCIA', 'DESC')
                ->paginate(100000);
                return view('ferrevente3.fv3', compact('products','user'));
        }

        $searchTerms = explode(' ', $search_text);
            $query = DB::table('ferre3s');
            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('PRODUCTO', 'LIKE', "%$term%")
                        ->orWhere('CODIGO', 'LIKE', "%$term%");
                });
            }
            
            $products = $query->orderBy('EXISTENCIA', 'DESC')
                ->paginate(100000);
        return view('ferrevente3.fv3', compact('products','user'));
    }
}
