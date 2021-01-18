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
        ->selectRaw('contrato.*, canero.nombre as canero, trabajadores.nombre as trabajador')
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

        if($request->fecha_fin==null){
            $request->fecha_fin = '2050-01-01';
        }
        if($request->monto_incentivo==null){
            $request->monto_incentivo = 0;
        }
        if($request->monto_viaje==null){
            $request->monto_viaje = 0;
        }

        request()->validate([
            'fecha_inicio' => ['required', 'max:255'],
            //'fecha_fin' => ['required', 'max:255'],
            //'monto_incentivo' => ['required', 'max:255'],
            'sueldo' => ['required', 'max:255'],
        ]);

        $contrato = new Contrato();
        $contrato->codigo = $codigo;
        $contrato->faltas = 0;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->monto_incentivo = $request->monto_incentivo;
        $contrato->monto_viaje = $request->monto_viaje;
        $contrato->sueldo = $request->sueldo;
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
        request()->validate([
            'faltas' => ['required', 'max:255', 'integer'],
            'fecha_inicio' => ['required', 'max:255'],
            //'fecha_fin' => ['required', 'max:255'],
            //'monto_incentivo' => ['required', 'max:255'],
            'sueldo' => ['required', 'max:255'],
        ]);

        $contrato1 = Contrato::find($id);
        $contrato1->fecha_hasta = date('Y-m-d H:i:s');
        $contrato1->indicador = 'D';
        $contrato1->save();

        if($request->monto_incentivo==null){
            $request->monto_incentivo = 0;
        }
        if($request->fecha_fin==null){
            $request->fecha_fin = '2050-01-01';
        }
        if($request->monto_viaje==null){
            $request->monto_viaje = 0;
        }

        $contrato = new Contrato();
        $contrato->codigo = $contrato1->codigo;
        $contrato->faltas = $request->faltas;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->monto_incentivo = $request->monto_incentivo;
        $contrato->monto_viaje = $request->monto_viaje;
        $contrato->sueldo = $request->sueldo;
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

    public function faltas(Request $request, $id)
    {
        request()->validate([
            'faltas' => ['required', 'max:255', 'integer'],
        ]); 

        $contrato1 = Contrato::find($id);
        $contrato1->fecha_hasta = date('Y-m-d H:i:s');
        $contrato1->indicador = 'D';
        $contrato1->save();

        $contrato = new Contrato();
        $contrato->codigo = $contrato1->codigo;
        $contrato->faltas = $request->faltas;
        $contrato->fecha_inicio = $contrato1->fecha_inicio;
        $contrato->fecha_fin = $contrato1->fecha_fin;
        $contrato->monto_incentivo = $contrato1->monto_incentivo;
        $contrato->monto_viaje = $request->monto_viaje;
        $contrato->sueldo = $contrato1->sueldo;
        $contrato->cod_trabajador = $contrato1->cod_trabajador;
        $contrato->cod_canero = $contrato1->cod_canero;
        $contrato->fecha_proceso = date('Y-m-d H:i:s');
        $contrato->fecha_hasta = '2050-01-01';
        $contrato->indicador =  'A';
        $contrato->save();
        return redirect()->back();
    }

}
