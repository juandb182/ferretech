<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use PDF;




class PDFController extends Controller
{
    





    public function ImprimirPDF()
    {

        $products = DB::table('cotizacions')->where('user_id',Auth::User()->id)->get();


     
       

     

       

        // el visual studio lo marca como error pero funciona

        $pdf = PDF::loadView('pdfs.prueba',compact('products'));
        return $pdf->stream();


    }


    public function DescargarCotizacionPDF()
    {

        $nombre_usuario = Auth::user()->name;
        $datetime = Carbon::now()->toDateTimeString();
        $mytime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('d-m-y H:i:s');
        

        // el visual studio lo marca como error pero funciona

        $products = DB::table('cotizacions')->where('user_id',Auth::User()->id)->get();
        $pdf = PDF::loadView('pdfs.prueba',compact('products'));
        return $pdf->download("Cotizacion"." - ". $nombre_usuario. " - ".$mytime.".pdf");

        return redirect('')->route('cotizar.index');


    }


}
