<?php

namespace App\Http\Controllers;

use App\Models\ReportesWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ReportesWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reportes = ReportesWeb::all();


        return view('reportes.index', compact('reportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reporte = new ReportesWeb();

        $reporte->name = $request->input('name');
        $reporte->descripcion = $request->input('descripcion');

        $reporte->save();
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





    public function exportExcel()
    {
    
        

        // Crear una nueva instancia de Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        // Establecer valores en las celdas
        $sheet->setCellValue('A1', 'fv1_codigo');
        $sheet->setCellValue('B1', 'fv1_producto');
        $sheet->setCellValue('C1', 'precio_ferre1');
        $sheet->setCellValue('D1', 'existencia_ferre1s');

        $sheet->setCellValue('E1', 'fv3_codigo');
        $sheet->setCellValue('F1', 'fv3_producto');
        $sheet->setCellValue('G1', 'precio_ferre3');
        $sheet->setCellValue('H1', 'existencia_ferre3s');

        // Agregar datos de la consulta SQL a las celdas





        $data = DB::select('SELECT f1.CODIGO as fv1_codigo, f1.PRODUCTO as fv1_producto, f1.PRECIO as precio_ferre1, f1.EXISTENCIA AS existencia_ferre1s, f3.CODIGO as fv3_codigo, f3.PRODUCTO as fv3_producto, f3.PRECIO as precio_ferre3, f3.EXISTENCIA AS existencia_ferre3s
        FROM ferre1s f1
        JOIN ferre3s f3 ON f1.CODIGO = f3.CODIGO
        WHERE f1.PRODUCTO = f3.PRODUCTO AND f1.PRECIO <> f3.PRECIO');



        $row = 2;


        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->fv1_codigo);
            $sheet->setCellValue('B' . $row, $item->fv1_producto);
            $sheet->setCellValue('C' . $row, $item->precio_ferre1);
            $sheet->setCellValue('D' . $row, $item->existencia_ferre1s);

            $sheet->setCellValue('E' . $row, $item->fv3_codigo);
            $sheet->setCellValue('F' . $row, $item->fv3_producto);
            $sheet->setCellValue('G' . $row, $item->precio_ferre3);
            $sheet->setCellValue('H' . $row, $item->existencia_ferre3s);


            $row++;
        }

        // Crear un objeto Writer para guardar el archivo Excel
        $writer = new Xlsx($spreadsheet);

        // Guardar el archivo en una ubicación específica
        $writer->save('archivo.xlsx');

        // Descargar el archivo Excel en el navegador
        return response()->download('archivo.xlsx')->deleteFileAfterSend(true);
    }















}
