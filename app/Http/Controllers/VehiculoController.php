<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;

class VehiculoController extends Controller
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
        $vehiculo = DB::table('vehiculo')
        ->join('canero', 'canero.cod_canero', '=', 'vehiculo.cod_canero')
        ->select('vehiculo.*','canero.nombre as canero')
        ->where('vehiculo.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->get();

        $canero = DB::table('canero')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();


        return view('admin\vehiculo\index', compact('vehiculo','canero'));
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
        $vehiculo = DB::table('vehiculo')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($vehiculo==null){
            $codigo = 10;
        }else{
        $codigo = $vehiculo->codigo + 10;
        }
        request()->validate([
            'tara' => ['required', 'max:255'],
            'placa' => ['required', 'max:255'],
            'tipo' => ['required', 'max:255'],
        ]);

        $vehiculo = new Vehiculo();
        $vehiculo->codigo = $codigo;
        $vehiculo->tara = $request->tara;
        $vehiculo->placa = $request->placa;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->cod_canero = $request->cod_canero;
        $vehiculo->fecha_proceso = date('Y-m-d H:i:s');
        $vehiculo->fecha_hasta = '2050-01-01';
        $vehiculo->indicador =  'A';
        $vehiculo->save();
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
            'tara' => ['required', 'max:255'],
            'placa' => ['required', 'max:255'],
            'tipo' => ['required', 'max:255'],
        ]);
        
        $vehiculo1 = Vehiculo::find($id);
        $vehiculo1->fecha_hasta = date('Y-m-d H:i:s');
        $vehiculo1->indicador = 'D';
        $vehiculo1->save();

        $vehiculo = new Vehiculo();
        $vehiculo->codigo = $vehiculo1->codigo;
        $vehiculo->tara = $request->tara;
        $vehiculo->placa = $request->placa;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->cod_canero = $request->cod_canero;
        $vehiculo->fecha_proceso = date('Y-m-d H:i:s');
        $vehiculo->fecha_hasta = '2050-01-01';
        $vehiculo->indicador =  'A';
        $vehiculo->save();
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
        $vehiculo = Vehiculo::find($id);
        $vehiculo->fecha_hasta = date('Y-m-d H:i:s');
        $vehiculo->indicador = 'D';
        $vehiculo->save();

        return redirect()->back();
    }
}
