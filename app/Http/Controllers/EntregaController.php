<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Entrega;

class EntregaController extends Controller
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
        $entrega = DB::table('entrega')
        ->join('trabajadores', 'entrega.cod_trabajador', '=', 'trabajadores.codigo')
        ->join('canero', 'entrega.cod_canero', '=', 'canero.cod_canero')
        ->join('vehiculo', 'entrega.cod_vehiculo', '=', 'vehiculo.codigo')
        ->join('corte', 'entrega.cod_corte', '=', 'corte.codigo')
        ->join('tipo_cana', 'entrega.cod_tipo', '=', 'tipo_cana.codigo')
        ->selectRaw('entrega.*, canero.nombre as canero, trabajadores.nombre as trabajador, vehiculo.placa as vehiculo, vehiculo.tara as tara, corte.descripcion as corte, tipo_cana.descripcion as tipo')
        ->where('entrega.indicador', '=', 'A')
        ->where('trabajadores.indicador', '=', 'A')
        ->where('vehiculo.indicador', '=', 'A')
        ->where('corte.indicador', '=', 'A')
        ->where('tipo_cana.indicador', '=', 'A')
        ->get();

        $canero = DB::table('canero')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $trabajador = DB::table('trabajadores')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $vehiculo = DB::table('vehiculo')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $corte = DB::table('corte')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        $tipo = DB::table('tipo_cana')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();



        return view('admin\entrega\index', compact('entrega','canero','trabajador','vehiculo','corte','tipo'));
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
        $entrega = DB::table('entrega')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($entrega==null){
            $codigo = 10;
        }else{
        $codigo = $entrega->codigo + 10;
        }

        request()->validate([
            'fecha_entrega' => ['required', 'max:255'],
            'paquete' => ['required', 'max:255'],
            'peso_neto' => ['required', 'max:99999999999', 'integer'],
            'peso_neto' => ['required', 'max:255'],
            'cod_corte' => ['required', 'max:255'],
            'cod_tipo' => ['required', 'max:255'],
            'cod_vehiculo' => ['required', 'max:255'],
            'cod_trabajador' => ['required', 'max:255'],
            'cod_canero' => ['required', 'max:255'],
        ]);


        $entrega = new Entrega();
        $entrega->codigo = $codigo;
        $entrega->fecha_entrega = $request->fecha_entrega;
        $entrega->paquete = $request->paquete;
        $entrega->peso_neto = $request->peso_neto;
        $entrega->cod_corte = $request->cod_corte;
        $entrega->cod_tipo = $request->cod_tipo;
        $entrega->cod_vehiculo = $request->cod_vehiculo;
        $entrega->cod_trabajador = $request->cod_trabajador;
        $entrega->cod_canero = $request->cod_canero;
        $entrega->fecha_proceso = date('Y-m-d H:i:s');
        $entrega->fecha_hasta = '2050-01-01';
        $entrega->indicador =  'A';
        $entrega->save();
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
            'fecha_entrega' => ['required', 'max:255'],
            'paquete' => ['required', 'max:255'],
            'peso_neto' => ['required', 'max:99999999999', 'integer'],
            'peso_neto' => ['required', 'max:255'],
            'cod_corte' => ['required', 'max:255'],
            'cod_tipo' => ['required', 'max:255'],
            'cod_vehiculo' => ['required', 'max:255'],
            'cod_trabajador' => ['required', 'max:255'],
            'cod_canero' => ['required', 'max:255'],
        ]);
        
        $entrega1 = Entrega::find($id);
        $entrega1->fecha_hasta = date('Y-m-d H:i:s');
        $entrega1->indicador = 'D';
        $entrega1->save();

        $entrega = new Entrega();
        $entrega->codigo = $entrega1->codigo;
        $entrega->fecha_entrega = $request->fecha_entrega;
        $entrega->paquete = $request->paquete;
        $entrega->peso_neto = $request->peso_neto;
        $entrega->cod_corte = $request->cod_corte;
        $entrega->cod_tipo = $request->cod_tipo;
        $entrega->cod_vehiculo = $request->cod_vehiculo;
        $entrega->cod_trabajador = $request->cod_trabajador;
        $entrega->cod_canero = $request->cod_canero;
        $entrega->fecha_proceso = date('Y-m-d H:i:s');
        $entrega->fecha_hasta = '2050-01-01';
        $entrega->indicador =  'A';
        $entrega->save();
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
        $entrega = Entrega::find($id);
        $entrega->fecha_hasta = date('Y-m-d H:i:s');
        $entrega->indicador = 'D';
        $entrega->save();

        return redirect()->back();
    }
}
