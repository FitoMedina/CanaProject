<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tipochata;
use Facade\Ignition\Tabs\Tab;

class TipochataController extends Controller
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
        $tipo_chata = DB::table('tipo_chata')
                    ->select(DB::raw('*'))
                    ->where('indicador', '=', 'A')
                    ->get();



        return view('admin\tipochata\index', compact('tipo_chata'));
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
        $tipo_chata = DB::table('tipo_chata')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($tipo_chata==null){
            $codigo = 10;
        }else{
        $codigo = $tipo_chata->codigo + 10;
        }

        request()->validate([
            'descripcion' => ['required', 'max:255'],
        ]);

        $tipo_chata = new Tipochata();
        $tipo_chata->codigo = $codigo;
        $tipo_chata->descripcion = $request->descripcion;
        $tipo_chata->rodamientogrande = $request->rodamientogrande;
        $tipo_chata->rodamientopeque = $request->rodamientopeque;
        $tipo_chata->reten = $request->reten;
        $tipo_chata->detallerodagrande = $request->detallerodagrande;
        $tipo_chata->detallerodapeque = $request->detallerodapeque;
        $tipo_chata->detalleretenpeque = $request->detalleretenpeque;
        $tipo_chata->detalleretengrande = $request->detalleretengrande;
        $tipo_chata->fecha_proceso = date('Y-m-d H:i:s');
        $tipo_chata->fecha_hasta = '2050-01-01';
        $tipo_chata->indicador =  'A';
        $tipo_chata->save();
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
            'descripcion' => ['required', 'max:255']
        ]);
        
        $tipo_chata1 = Tipochata::find($id);
        $tipo_chata1->fecha_hasta = date('Y-m-d H:i:s');
        $tipo_chata1->indicador = 'D';
        $tipo_chata1->save();

        $tipo_chata = new Tipochata();
        $tipo_chata->codigo = $tipo_chata1->codigo;
        $tipo_chata->descripcion = $request->descripcion;
        $tipo_chata->rodamientogrande = $request->rodamientogrande;
        $tipo_chata->rodamientopeque = $request->rodamientopeque;
        $tipo_chata->reten = $request->reten;
        $tipo_chata->detallerodagrande = $request->detallerodagrande;
        $tipo_chata->detallerodapeque = $request->detallerodapeque;
        $tipo_chata->detalleretenpeque = $request->detalleretenpeque;
        $tipo_chata->detalleretengrande = $request->detalleretengrande;
        $tipo_chata->fecha_proceso = date('Y-m-d H:i:s');
        
        $tipo_chata->fecha_hasta = '2050-01-01';
        $tipo_chata->indicador =  'A';
        $tipo_chata->save();
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
        $chata = Tipochata::find($id);
        $chata->fecha_hasta = date('Y-m-d H:i:s');
        $chata->indicador = 'D';
        $chata->save();

        return redirect()->back();
    }
}
