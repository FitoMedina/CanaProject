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
    return view('welcome');
});

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