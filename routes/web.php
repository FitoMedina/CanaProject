<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CaneroController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\CorteController;
use App\Http\Controllers\TipocanaController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ChataController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReporteController;

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

Route::get('/', [LoginController::class, 'showLoginForm']);

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('home');



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('canero', CaneroController::class);
Route::resource('cargo', CargoController::class);
Route::resource('trabajador', TrabajadorController::class);
Route::resource('corte', CorteController::class);
Route::resource('tipo', TipocanaController::class);
Route::resource('propiedad', PropiedadController::class);
Route::resource('lote', LoteController::class);
Route::resource('vehiculo', VehiculoController::class);
Route::resource('chata', ChataController::class);
Route::resource('contrato', ContratoController::class);
Route::put('contrato/faltas/{id}', [ContratoController::class, 'faltas']);
Route::resource('entrega', EntregaController::class);
Route::resource('pago', PagoController::class);
Route::resource('gasto', GastoController::class);
Route::get('/liquidacion', [ReporteController::class, 'liquidacion'])->name('liquidacion');
Route::get('/liquidaciontotal', [ReporteController::class, 'liquidacionTotal'])->name('liquidacionTotal');
Route::get('/pdf', [PDFController::class, 'contratoPDF'])->name('contratoPDF');
Route::post('/pdf/trab', [PDFController::class, 'contratoPDFtrab'])->name('contratoPDFtrab');