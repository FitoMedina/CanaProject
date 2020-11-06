<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropiedadController extends Controller
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
        $propiedad = DB::table('propiedad')
        ->join('canero', 'canero.cod_canero', '=', 'propiedad.cod_canero')
        ->select('propiedad.*','canero.nombre as canero')
        ->where('propiedad.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->get();

        $canero = DB::table('canero')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();


        return view('admin\propiedad\index', compact('propiedad','canero'));
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
        $propiedad = DB::table('propiedad')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($propiedad==null){
            $codigo = 10;
        }else{
        $codigo = $propiedad->codigo + 10;
        }

        request()->validate([
            'ubicacion' => ['required', 'max:99999999999', 'integer'],
            'nombre' => ['required', 'max:255'],
            'hectareas' => ['required', 'max:99999999999', 'integer'],
        ]);

        $propiedad = new Propiedad();
        $propiedad->codigo = $codigo;
        $propiedad->hectareas = $request->hectareas;
        $propiedad->nombre = $request->nombre;
        $propiedad->ubicacion = $request->ubicacion;
        $propiedad->cod_canero = $request->cod_canero;
        $propiedad->fecha_proceso = date('Y-m-d H:i:s');
        $propiedad->fecha_hasta = '2050-01-01';
        $propiedad->indicador =  'A';
        $propiedad->save();
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
            'ubicacion' => ['required', 'max:255', 'integer'],
            'nombre' => ['required', 'max:255'],
            'hectareas' => ['required', 'max:99999999999', 'integer'],
        ]);

        $propiedad1 = Propiedad::find($id);
        $propiedad1->fecha_hasta = date('Y-m-d H:i:s');
        $propiedad1->indicador = 'D';
        $propiedad1->save();

        $propiedad = new Propiedad();
        $propiedad->codigo = $propiedad1->codigo;
        $propiedad->hectareas = $request->hectareas;
        $propiedad->nombre = $request->nombre;
        $propiedad->ubicacion = $request->ubicacion;
        $propiedad->cod_canero = $request->cod_canero;
        $propiedad->fecha_proceso = date('Y-m-d H:i:s');
        $propiedad->fecha_hasta = '2050-01-01';
        $propiedad->indicador =  'A';
        $propiedad->save();
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
        $propiedad = Propiedad::find($id);
        $propiedad->fecha_hasta = date('Y-m-d H:i:s');
        $propiedad->indicador = 'D';
        $propiedad->save();

        return redirect()->back();
    }
}
