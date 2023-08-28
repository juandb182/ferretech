<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaFerrevente1;
use App\Http\Controllers\ConsultaFerrevente3;
use App\Http\Controllers\ConsultaFerreventeGeneral;
use App\Http\Controllers\FactorReferencialController;
use App\Http\Controllers\FerreDataController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductsListController;
use App\Http\Controllers\ReportesWebController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckUserType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});





Route::resource('/fv1', ConsultaFerrevente1::class);
Route::resource('/fv3', ConsultaFerrevente3::class);
Route::resource('/general',ConsultaFerreventeGeneral::class);



Route::get('/reportes/descargar', [ReportesWebController::class, 'exportExcel']);
Route::resource('/reportes',ReportesWebController::class);









Route::resource('/ubicacion', UbicacionController::class);
Route::get('/searchUbicacion', [UbicacionController::class, 'search']);




//busqueda individuales por sede
Route::get('/searchfv1', [ConsultaFerrevente1::class, 'search']);
Route::get('/searchfv3', [ConsultaFerrevente3::class, 'search']);
Route::get('/searchGeneral', [ConsultaFerreventeGeneral::class, 'search']);



//busqueda rapida
Route::post('/myurl', [ConsultaFerrevente1::class, 'shows']);

//busqueda de usuario en users.index
Route::get('/searchUser', [UsersController::class, 'search']);



Route::resource('/users', UsersController::class)->middleware(CheckUserType::class);
Route::resource('/db', FerreDataController::class)->middleware(CheckUserType::class);



Route::resource('/cotizar', ProductsListController::class);
Route::get('/cotizar/add/{id}', [ProductsListController::class, 'add']);
Route::get('/cotizar/addfv3/{id}', [ProductsListController::class, 'addfv3']);

Route::post('/storeProduct', [ProductsListController::class, 'storeProduct']);
Route::get('/clear', [ProductsListController::class, 'clear']);


Route::resource('/factor_ref', FactorReferencialController::class);



Route::get('/deleteFv1', [FerreDataController::class, 'destroyFv1'])->middleware(CheckUserType::class);
Route::get('/deleteFv3', [FerreDataController::class, 'destroyFv3'])->middleware(CheckUserType::class);
Route::get('/deleteAll', [FerreDataController::class, 'destroyAll'])->middleware(CheckUserType::class);



Route::get('/imprimirPDF', [PDFController::class, 'ImprimirPDF']);
Route::get('/download/pdf', [PDFController::class, 'DescargarCotizacionPDF']);



Route::resource('/res', function(){
    return 'res';
});


