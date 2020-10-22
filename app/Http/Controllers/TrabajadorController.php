<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
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
        $trabajador = DB::table('trabajadores')
        ->join('cargo', 'cargo.codigo', '=', 'trabajadores.cod_cargo')
        ->select('trabajadores.*','cargo.nombre as cargo')
        ->where('trabajadores.indicador', '=', 'A')
        ->where('cargo.indicador', '=', 'A')
        ->get();

        $cargo = DB::table('cargo')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();


        return view('admin\trabajador\index', compact('trabajador','cargo'));
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
        $trabajador = DB::table('trabajadores')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($trabajador==null){
            $codigo = 10;
        }else{
        $codigo = $trabajador->codigo + 10;
        }

        $trabajador = new Trabajador();
        $trabajador->codigo = $codigo;
        $trabajador->nombre = $request->nombre;
        $trabajador->identificacion = $request->identificacion;
        $trabajador->telefono = $request->telefono;
        $trabajador->cod_cargo = $request->cod_cargo;
        $trabajador->fecha_proceso = date('Y-m-d H:i:s');
        $trabajador->fecha_hasta = '2050-01-01';
        $trabajador->indicador =  'A';
        $trabajador->save();
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
        $trabajador1 = Trabajador::find($id);
        $trabajador1->fecha_hasta = date('Y-m-d H:i:s');
        $trabajador1->indicador = 'D';
        $trabajador1->save();

        $trabajador = new Trabajador();
        $trabajador->codigo = $trabajador1->codigo;
        $trabajador->nombre = $request->nombre;
        $trabajador->identificacion = $request->identificacion;
        $trabajador->telefono = $request->telefono;
        $trabajador->cod_cargo = $request->cod_cargo;
        $trabajador->fecha_proceso = date('Y-m-d H:i:s');
        $trabajador->fecha_hasta = '2050-01-01';
        $trabajador->indicador =  'A';
        $trabajador->save();
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
        $trabajador = Trabajador::find($id);
        $trabajador->fecha_hasta = date('Y-m-d H:i:s');
        $trabajador->indicador = 'D';
        $trabajador->save();

        return redirect()->back();
    }
}
