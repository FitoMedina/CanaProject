<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CargoController extends Controller
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
        $cargo = DB::table('cargo')
        ->select(DB::raw('*'))
        ->where('indicador', '=', 'A')
        ->get();

        return view('admin\cargo\index', compact('cargo'));
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
        $cargo = DB::table('cargo')
        ->select('codigo')
        ->orderByRaw('id  DESC')
        ->first();

        if($cargo==null){
            $codigo = 10;
        }else{
        $codigo = $cargo->codigo + 10;
        }
        
        request()->validate([
            'nombre' => ['required', 'max:255'. 'alpha'],
            'sueldo' => ['required', 'max:99999999999', 'numeric'],
        ]);

        $cargo = new Cargo();
        $cargo->codigo = $codigo;
        $cargo->nombre = $request->nombre;
        $cargo->sueldo = $request->sueldo;
        $cargo->fecha_proceso = date('Y-m-d H:i:s');
        $cargo->fecha_hasta = '2050-01-01';
        $cargo->indicador =  'A';
        $cargo->save();
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
            'nombre' => ['required', 'max:255'. 'alpha'],
            'sueldo' => ['required', 'max:99999999999', 'numeric'],
        ]);
        
        $cargo1 = Cargo::find($id);
        $cargo1->fecha_hasta = date('Y-m-d H:i:s');
        $cargo1->indicador = 'D';
        $cargo1->save();

        $cargo = new Cargo();
        $cargo->codigo = $cargo1->codigo;
        $cargo->nombre = $request->nombre;
        $cargo->sueldo = $request->sueldo;
        $cargo->fecha_proceso = date('Y-m-d H:i:s');
        $cargo->fecha_hasta = '2050-01-01';
        $cargo->indicador =  'A';
        $cargo->save();

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
        $cargo = Cargo::find($id);
        $cargo->fecha_hasta = date('Y-m-d H:i:s');
        $cargo->indicador = 'D';
        $cargo->save();

        return redirect()->back();
    }
}
