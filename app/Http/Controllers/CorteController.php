<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Corte;

class CorteController extends Controller
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
        $corte = DB::table('corte')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        return view('admin\corte\index', compact('corte'));
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
        $corte = DB::table('corte')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($corte==null){
            $codigo = 10;
        }else{
        $codigo = $corte->codigo + 10;
        }

        request()->validate([
            'descripcion' => ['required', 'max:255'],
        ]);

        $corte = new Corte();
        $corte->codigo = $codigo;
        $corte->descripcion = $request->descripcion;
        $corte->fecha_proceso = date('Y-m-d H:i:s');
        $corte->fecha_hasta = '2050-01-01';
        $corte->indicador =  'A';
        $corte->save();
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
            'descripcion' => ['required', 'max:255'],
        ]);
        $corte1 = Corte::find($id);
        $corte1->fecha_hasta = date('Y-m-d H:i:s');
        $corte1->indicador = 'D';
        $corte1->save();

        $corte = new Corte();
        $corte->codigo = $corte1->codigo;
        $corte->descripcion = $request->descripcion;
        $corte->fecha_proceso = date('Y-m-d H:i:s');
        $corte->fecha_hasta = '2050-01-01';
        $corte->indicador =  'A';
        $corte->save();

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
        $corte = Corte::find($id);
        $corte->fecha_hasta = date('Y-m-d H:i:s');
        $corte->indicador = 'D';
        $corte->save();

        return redirect()->back();
    }
}
