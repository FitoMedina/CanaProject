<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gasto;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrato = DB::table('gasto')
        ->join('canero', 'gasto.cod_canero', '=', 'canero.cod_canero')
        ->join('lote', 'gasto.cod_lote', '=', 'lote.codigo')
        ->join('vehiculo', 'gasto.cod_vehiculo', '=', 'vehiculo.codigo')
        ->join('chata', 'gasto.cod_camion', '=', 'chata.codigo')
        ->selectRaw('gasto.*, canero.nombre as canero, lote.codigo as lote, vehiculo.placa as vehiculo, chata.tara as tara')
        ->where('contrato.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->where('trabajadores.indicador', '=', 'A')
        ->get();

        $canero = DB::table('canero')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $trabajador = DB::table('lote')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $trabajador = DB::table('vehiculo')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $trabajador = DB::table('chata')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        return view('admin\gasto\index', compact('contrato','canero','lote','vehiculo','chata'));
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
        $gasto = DB::table('gasto')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($gasto==null){
            $codigo = 10;
        }else{
        $codigo = $gasto->codigo + 10;
        }

        $gasto = new Gasto();
        $gasto->codigo = $codigo;
        $gasto->interes = $request->interes;
        $gasto->monto = $request->monto;
        $gasto->motivo = $request->motivo;
        $gasto->cod_camion = $request->cod_camion;
        $gasto->cod_chata = $request->cod_chata;
        $gasto->cod_lote = $request->cod_lote;
        $gasto->cod_canero = $request->cod_canero;
        $gasto->fecha_proceso = date('Y-m-d H:i:s');
        $gasto->fecha_hasta = '2050-01-01';
        $gasto->indicador =  'A';
        $gasto->save();
        return redirect()->back();
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
}
