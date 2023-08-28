<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Models\Ferre1;
use App\Models\Ferre3;
use App\Models\User;

class ProductsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = DB::table('cotizacions')->where('user_id',Auth::User()->id)->get();

        return view("cotizacion.index",compact('products'));
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
        
        $product = Cotizacion::findOrFail($id);


        return view('cotizacion.edit',compact('product'));

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

      
        $factorReferencial = DB::table('factor_referencials')->latest()->first();
        $factorReferencialDolares = $factorReferencial->FactorReferencial;

        $product = Cotizacion::findOrFail($id);

        $data = $request->only('cantidad','precio');

        $product->update($data);


        $product->precio_total_dolares = $product->cantidad * $product->precio;
        $product->precio_bolivares = $product->precio * $factorReferencialDolares;
        $product->precio_total_bolivares = $product->cantidad * $product->precio_bolivares;

        
      $product->save();


        return redirect()->route('cotizar.index')->with('success','Producto Editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Cotizacion::find($id);
        $producto->delete();

        return redirect()->route('cotizar.index')->with('success','Producto Eliminado con exito.');  
    }


    public function add($id)
    {
    
        
        $product = Ferre1::findOrFail($id);

 

      


        return view('cotizacion.addProduct',compact('product'));
        
    }

    public function addfv3($id)
    {


        
        $product = Ferre3::findOrFail($id);

       
        
      


        return view('cotizacion.addProduct',compact('product'));
        
    }


    public function storeProduct(Request $request)
    {
        
   
        $factorReferencial = DB::table('factor_referencials')->latest()->first();
        $factorReferencialDolares = $factorReferencial->FactorReferencial;
       



    


        $productCotizado = new Cotizacion();

        $productCotizado->codigo = $request->input('codigo');
        $productCotizado->producto = $request->input('producto');
        $productCotizado->precio = $request->input('precio');
        $productCotizado->cantidad = $request->input('cantidad');
        $productCotizado->precio_total_dolares = $productCotizado->cantidad * $productCotizado->precio;
        $productCotizado->precio_bolivares = $productCotizado->precio * $factorReferencialDolares;
        $productCotizado->precio_total_bolivares = $productCotizado->cantidad * $productCotizado->precio_bolivares;
        $productCotizado->user_id = Auth::User()->id;
        

       



        $productCotizado->save();
       

       


        return redirect()->route('cotizar.index')->with('success','El producto se ha almacenado con exito');
    }


    public function clear()
    {

       DB::table('cotizacions')->where('user_id',Auth::User()->id)->delete();

      
 
      

        return redirect()->route("cotizar.index")->with('success','Se han limpiado los registros exitosamente.');
        

    }
}
