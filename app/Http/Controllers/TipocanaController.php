<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tipocana;

class TipocanaController extends Controller
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
        $tipo = DB::table('tipo_cana')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        return view('admin\tipo\index', compact('tipo'));
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
        $tipo = DB::table('tipo_cana')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($tipo==null){
            $codigo = 10;
        }else{
        $codigo = $tipo->codigo + 10;
        }
        
        request()->validate([
            'descripcion' => ['required', 'max:255'],
        ]);

        $tipo = new Tipocana();
        $tipo->codigo = $codigo;
        $tipo->descripcion = $request->descripcion;
        $tipo->fecha_proceso = date('Y-m-d H:i:s');
        $tipo->fecha_hasta = '2050-01-01';
        $tipo->indicador =  'A';
        $tipo->save();
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
        
        $tipo1 = Tipocana::find($id);
        $tipo1->fecha_hasta = date('Y-m-d H:i:s');
        $tipo1->indicador = 'D';
        $tipo1->save();

        $tipo = new Tipocana();
        $tipo->codigo = $tipo1->codigo;
        $tipo->descripcion = $request->descripcion;
        $tipo->fecha_proceso = date('Y-m-d H:i:s');
        $tipo->fecha_hasta = '2050-01-01';
        $tipo->indicador =  'A';
        $tipo->save();

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
        $tipo = Tipocana::find($id);
        $tipo->fecha_hasta = date('Y-m-d H:i:s');
        $tipo->indicador = 'D';
        $tipo->save();

        return redirect()->back();
    }
}
