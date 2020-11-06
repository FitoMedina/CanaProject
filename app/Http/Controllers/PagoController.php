<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pago;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pago = DB::table('pago')
        ->join('contrato', 'pago.cod_contrato', '=', 'contrato.codigo')
        ->selectRaw('pago.*, contrato.codigo as contrato ')
        ->where('contrato.indicador', '=', 'A')
        ->where('pago.indicador', '=', 'A')
        ->get();

        $contrato = DB::table('contrato')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        return view('admin\pago\index', compact('contrato','pago'));
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
        $pago = DB::table('pago')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($pago==null){
            $codigo = 10;
        }else{
        $codigo = $pago->codigo + 10;
        }

        request()->validate([
            'fecha' => ['required', 'max:255'],
            'tipo' => ['required', 'max:255'],
            'monto' => ['required', 'max:99999999999', 'integer'],
        ]);

        $pago = new Pago();
        $pago->codigo = $codigo;
        $pago->fecha = $request->fecha;
        $pago->monto = $request->monto;
        $pago->tipo = $request->tipo;
        $pago->cod_contrato = $request->cod_contrato;
        $pago->fecha_proceso = date('Y-m-d H:i:s');
        $pago->fecha_hasta = '2050-01-01';
        $pago->indicador =  'A';
        $pago->save();
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
            'fecha' => ['required', 'max:255'],
            'tipo' => ['required', 'max:255'],
            'monto' => ['required', 'max:99999999999', 'integer'],
        ]);
        
        $pago1 = Pago::find($id);
        $pago1->fecha_hasta = date('Y-m-d H:i:s');
        $pago1->indicador = 'D';
        $pago1->save();

        $pago = new Pago();
        $pago->codigo = $pago1->codigo;
        $pago->fecha = $request->fecha;
        $pago->monto = $request->monto;
        $pago->tipo = $request->tipo;
        $pago->cod_contrato = $request->cod_contrato;
        $pago->fecha_proceso = date('Y-m-d H:i:s');
        $pago->fecha_hasta = '2050-01-01';
        $pago->indicador =  'A';
        $pago->save();
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
        $pago = Pago::find($id);
        $pago->fecha_hasta = date('Y-m-d H:i:s');
        $pago->indicador = 'D';
        $pago->save();

        return redirect()->back();
    }
}
