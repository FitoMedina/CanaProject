<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lote = DB::table('lote')
        ->join('propiedad', 'lote.cod_propiedad', '=', 'propiedad.codigo')
        ->select('lote.*','propiedad.nombre as propiedad')
        ->where('propiedad.indicador', '=', 'A')
        ->where('lote.indicador', '=', 'A')
        ->get();

        $propiedad = DB::table('propiedad')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        return view('admin\lote\index', compact('lote','propiedad'));
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
        $lote = DB::table('lote')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($lote==null){
            $codigo = 10;
        }else{
        $codigo = $lote->codigo + 10;
        }

        request()->validate([
            'distancia' => ['required', 'max:99999999999', 'integer'],
        ]);

        $lote = new Lote();
        $lote->codigo = $codigo;
        $lote->distancia = $request->distancia;
        $lote->cod_propiedad = $request->cod_propiedad;
        $lote->fecha_proceso = date('Y-m-d H:i:s');
        $lote->fecha_hasta = '2050-01-01';
        $lote->indicador =  'A';
        $lote->save();
        
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
            'distancia' => ['required', 'max:99999999999', 'integer'],
        ]);
        $lote1 = Lote::find($id);
        $lote1->fecha_hasta = date('Y-m-d H:i:s');
        $lote1->indicador = 'D';
        $lote1->save();

        $lote = new Lote();
        $lote->codigo = $lote1->codigo;
        $lote->distancia = $request->distancia;
        $lote->cod_propiedad = $request->cod_propiedad;
        $lote->fecha_proceso = date('Y-m-d H:i:s');
        $lote->fecha_hasta = '2050-01-01';
        $lote->indicador =  'A';
        $lote->save();
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
        $lote = Lote::find($id);
        $lote->fecha_hasta = date('Y-m-d H:i:s');
        $lote->indicador = 'D';
        $lote->save();

        return redirect()->back();
    }
}
