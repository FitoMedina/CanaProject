<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contrato;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contrato = DB::table('contrato')
        ->join('trabajadores', 'contrato.cod_trabajador', '=', 'trabajadores.codigo')
        ->join('canero', 'contrato.cod_canero', '=', 'canero.cod_canero')
        ->select('contrato.*','canero.nombre as canero','trabajadores.nombre as trabajador')
        ->where('contrato.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->where('trabajadores.indicador', '=', 'A')
        ->get();

        $canero = DB::table('canero')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $trabajador = DB::table('trabajadores')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();


        return view('admin\contrato\index', compact('contrato','canero','trabajador'));
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
        $contrato = DB::table('contrato')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($contrato==null){
            $codigo = 10;
        }else{
        $codigo = $contrato->codigo + 10;
        }

        $contrato = new Contrato();
        $contrato->codigo = $codigo;
        $contrato->faltas = $request->faltas;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->incentivo = $request->incentivo;
        $contrato->monto_incentivo = $request->monto_incentivo;
        $contrato->sueldo = $request->sueldo;
        $contrato->viatico = $request->viatico;
        $contrato->cod_trabajador = $request->cod_trabajador;
        $contrato->cod_canero = $request->cod_canero;
        $contrato->fecha_proceso = date('Y-m-d H:i:s');
        $contrato->fecha_hasta = '2050-01-01';
        $contrato->indicador =  'A';
        $contrato->save();
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
        $contrato1 = Contrato::find($id);
        $contrato1->fecha_hasta = date('Y-m-d H:i:s');
        $contrato1->indicador = 'D';
        $contrato1->save();

        $contrato = new Contrato();
        $contrato->codigo = $contrato1->codigo;
        $contrato->faltas = $request->faltas;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->incentivo = $request->incentivo;
        $contrato->monto_incentivo = $request->monto_incentivo;
        $contrato->sueldo = $request->sueldo;
        $contrato->viatico = $request->viatico;
        $contrato->cod_trabajador = $request->cod_trabajador;
        $contrato->cod_canero = $request->cod_canero;
        $contrato->fecha_proceso = date('Y-m-d H:i:s');
        $contrato->fecha_hasta = '2050-01-01';
        $contrato->indicador =  'A';
        $contrato->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->fecha_hasta = date('Y-m-d H:i:s');
        $contrato->indicador = 'D';
        $contrato->save();

        return redirect()->back();
    }
}
