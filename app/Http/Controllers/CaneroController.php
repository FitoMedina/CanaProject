<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canero;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CaneroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$canero = Canero::all();
        
        $canero = DB::table('canero')
                     ->select(DB::raw('*'))
                     ->where('indicador', '=', 'A')
                     ->get();

        return view('admin\canero\index', compact('canero'));
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
        //$validator = Validator::make($request->all(), [
        //   'cod_canero' => ['required', 'max:255'],
        //    'direccion' => ['required', 'max:255'],
        //]);
        request()->validate([
            'cod_canero' => ['required', 'max:99999999999', 'integer'],
            'direccion' => ['required', 'max:255'],
            'identificacion' => ['required', 'max:255'],
            'nombre' => ['required', 'max:255'],
            'telefono' => ['required', 'max:99999999999', 'integer'],
        ]);
        //if ($validator->fails()) {
        //    return view('admin\canero\index');
        //}
        //else
        //{
        try{
        $canero = new Canero();
        $canero->cod_canero = $request->cod_canero;
        $canero->direccion = $request->direccion;
        $canero->identificacion = $request->identificacion;
        $canero->nombre = $request->nombre;
        $canero->telefono = $request->telefono;
        $canero->fecha_proceso = date('Y-m-d H:i:s');
        $canero->fecha_hasta = '2050-01-01';
        $canero->indicador =  'A';
        $canero->save();
        return redirect()->back();
        }
        catch(\Illuminate\Database\QueryException $e){
            return back()->withErrors(['message'=>'ERROR! Por favor revisar los datos']);
        }
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
            'cod_canero' => ['required', 'max:99999999999', 'integer'],
            'direccion' => ['required', 'max:255'],
            'identificacion' => ['required', 'max:255'],
            'nombre' => ['required', 'max:255'],
            'telefono' => ['required', 'max:99999999999', 'integer'],
        ]);

        $canero = Canero::find($id);
        $canero->fecha_hasta = date('Y-m-d H:i:s');
        $canero->indicador = 'D';
        $canero->save();

        $canero = new Canero();
        $canero->cod_canero = $request->cod_canero;
        $canero->direccion = $request->direccion;
        $canero->identificacion = $request->identificacion;
        $canero->nombre = $request->nombre;
        $canero->telefono = $request->telefono;
        $canero->fecha_proceso = date('Y-m-d H:i:s');
        $canero->fecha_hasta = '2050-01-01';
        $canero->indicador =  'A';
        $canero->save();

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
        $canero = Canero::find($id);
        $canero->fecha_hasta = date('Y-m-d H:i:s');
        $canero->indicador = 'D';
        $canero->save();
        
        return redirect()->back();
        /**
        * $canero = Canero::findOrFail($id);
        * $canero->delete();
        * return redirect()->back();
        */
    }
}
