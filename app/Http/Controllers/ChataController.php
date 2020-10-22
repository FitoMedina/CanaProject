<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Chata;
use Facade\Ignition\Tabs\Tab;

class ChataController extends Controller
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
        $chata = DB::table('chata')
        ->join('canero', 'canero.cod_canero', '=', 'chata.cod_canero')
        ->select('chata.*','canero.nombre as canero')
        ->where('chata.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->get();

        $canero = DB::table('canero')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();


        return view('admin\chata\index', compact('chata','canero'));
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
        $chata = DB::table('chata')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($chata==null){
            $codigo = 10;
        }else{
        $codigo = $chata->codigo + 10;
        }

        $chata = new Chata();
        $chata->codigo = $codigo;
        $chata->eje = $request->eje;
        $chata->reten = $request->reten;
        $chata->rodamiento = $request->rodamiento;
        $chata->rueda = $request->rueda;
        $chata->tara = $request->tara;
        $chata->cod_canero = $request->cod_canero;
        $chata->fecha_proceso = date('Y-m-d H:i:s');
        $chata->fecha_hasta = '2050-01-01';
        $chata->indicador =  'A';
        $chata->save();
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
        $chata1 = Chata::find($id);
        $chata1->fecha_hasta = date('Y-m-d H:i:s');
        $chata1->indicador = 'D';
        $chata1->save();

        $chata = new Chata();
        $chata->codigo = $chata1->codigo;
        $chata->eje = $request->eje;
        $chata->reten = $request->reten;
        $chata->rodamiento = $request->rodamiento;
        $chata->rueda = $request->rueda;
        $chata->tara = $request->tara;
        $chata->cod_canero = $request->cod_canero;
        $chata->fecha_proceso = date('Y-m-d H:i:s');
        $chata->fecha_hasta = '2050-01-01';
        $chata->indicador =  'A';
        $chata->save();
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
        $chata = Chata::find($id);
        $chata->fecha_hasta = date('Y-m-d H:i:s');
        $chata->indicador = 'D';
        $chata->save();

        return redirect()->back();
    }
}
