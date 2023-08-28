<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class FerreDataController extends Controller
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



        return view("database.ferredata");
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



       
           
         if ($request->fv1Upload != null && $request->fv3Upload == null) {
            # code... enviar solo fv1

            $fv1 = DB::table("ferre1s");
            $fv1->truncate();


            $fv1Name = $request->fv1Upload->getClientOriginalName();
            $fv1FileExtension = explode('.', $fv1Name);
            $fv1FileExtension = end($fv1FileExtension);

            if ($fv1FileExtension != 'xlsx') {
                return redirect()->route('db.index')->with('danger', 'No puedes enviar un archivo que no sea formato excel');  # code...
            }

            $rowsFv1 = Excel::toArray(new UsersExport, $request->fv1Upload);
            $dataFv1 = $rowsFv1[0];


            for ($i = 1; $i < count($dataFv1); $i++) {
                DB::table('ferre1s')->insert([
                    'CODIGO' => $dataFv1[$i][0],
                    'PRODUCTO' => $dataFv1[$i][1],
                    'PRECIO' => $dataFv1[$i][2],
                    'EXISTENCIA' => $dataFv1[$i][3],
                    'COSTO' => $dataFv1[$i][4],
                    'UBICACION' => $dataFv1[$i][5],
                    
                    
                ]);
            }


            return redirect()->route('db.index')->with('success', 'Se ha cargado los registros de FV1'); 

        } elseif ($request->fv1Upload == null && $request->fv3Upload != null) {

            $fv3 = DB::table("ferre3s");
            $fv3->truncate();



            $fv3Name = $request->fv3Upload->getClientOriginalName();
            $fv3FileExtension = explode('.', $fv3Name);
            $fv3FileExtension = end($fv3FileExtension);

            if ($fv3FileExtension != 'xlsx') {
                return redirect()->route('db.index')->with('danger', 'No puedes enviar un archivo que no sea formato excel'); 
            }


            $rowsFv3 = Excel::toArray(new UsersExport, $request->fv3Upload);
            $dataFv3 = $rowsFv3[0];


            for ($i = 1; $i < count($dataFv3); $i++) {
                DB::table('ferre3s')->insert([
                    'CODIGO' => $dataFv3[$i][0],
                    'PRODUCTO' => $dataFv3[$i][1],
                    'PRECIO' => $dataFv3[$i][2],
                    'EXISTENCIA' => $dataFv3[$i][3],
                    'COSTO' => $dataFv3[$i][4],
                    'UBICACION' => $dataFv3[$i][5],
                    
                ]);
            }

            return redirect()->route('db.index')->with('success', 'Se ha cargado los registros de FV3'); 

        } elseif ($request->fv1Upload == null && $request->fv3Upload == null) {
            return redirect()->route('db.index')->with('danger', 'No puedes enviar los archivos vacios.');
        } elseif ($request->fv1Upload != null && $request->fv3Upload != null) {
            # code... subir los 2

            $fv1 = DB::table("ferre1s");
            $fv1->delete();

            $fv3 = DB::table("ferre3s");
            $fv3->delete();

            $fv1Name = $request->fv1Upload->getClientOriginalName();
            $fv1FileExtension = explode('.', $fv1Name);
            $fv1FileExtension = end($fv1FileExtension);

            if ($fv1FileExtension != 'xlsx') {
                return redirect()->route('db.index')->with('danger', 'No puedes enviar un archivo que no sea formato excel'); 
            }

            $rowsFv1 = Excel::toArray(new UsersExport, $request->fv1Upload);
            $dataFv1 = $rowsFv1[0];


            for ($i = 1; $i < count($dataFv1); $i++) {
                DB::table('ferre1s')->insert([
                    'CODIGO' => $dataFv1[$i][0],
                    'PRODUCTO' => $dataFv1[$i][1],
                    'PRECIO' => $dataFv1[$i][2],
                    'EXISTENCIA' => $dataFv1[$i][3],
                     'COSTO' => $dataFv1[$i][4],
                     'UBICACION' => $dataFv1[$i][5],
                ]);
            }

            $fv3Name = $request->fv3Upload->getClientOriginalName();
            $fv3FileExtension = explode('.', $fv3Name);
            $fv3FileExtension = end($fv3FileExtension);

            if ($fv3FileExtension != 'xlsx') {
                return redirect()->route('db.index')->with('danger', 'No puedes enviar un archivo que no sea formato excel'); 
            }


            $rowsFv3 = Excel::toArray(new UsersExport, $request->fv3Upload);
            $dataFv3 = $rowsFv3[0];


            for ($i = 1; $i < count($dataFv3); $i++) {
                DB::table('ferre3s')->insert([
                    'CODIGO' => $dataFv3[$i][0],
                    'PRODUCTO' => $dataFv3[$i][1],
                    'PRECIO' => $dataFv3[$i][2],
                    'EXISTENCIA' => $dataFv3[$i][3],
                    'COSTO' => $dataFv3[$i][4],
                    'UBICACION' => $dataFv3[$i][5],
                ]);
            }


            return redirect()->route('db.index')->with('success', 'Se ha cargado los registros de FV1 y FV3'); 


        }






       


        return view('database.ferredata');
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



    public function destroyFv1()
    {
        if (Auth::user()) {
            $fv1 = DB::table("ferre1s");
            $fv1->delete();
        }

        return redirect()->route('db.index')->with('success1', 'La tabla de la sede Los Caobos ha sido limpiada con exito');
    }

    public function destroyFv3()
    {

        if (Auth::user()) {
            $fv3 = DB::table("ferre3s");
            $fv3->delete();
        }


        return redirect()->route('db.index')->with('success3', 'La tabla de la sede Mañongo ha sido limpiada con exito');
    }

    public function destroyAll()
    {

        if (Auth::user()) {
            $fv1 = DB::table("ferre1s");
            $fv1->delete();

            $fv3 = DB::table("ferre3s");
            $fv3->delete();
        }

        return redirect()->route('db.index')->with('successAll', 'Todas las tablas de productos han sido limpiada con exito');
    }
}
