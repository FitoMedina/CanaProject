<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function contratoPDF(){

        $pdf = \PDF::loadView('admin\contrato\pdf-contrato')->setPaper('letter');
        //return $pdf->download('contrato.pdf');
        return $pdf->stream('contrato.pdf');
    }
    public function contratoPDFtrab(Request $request){
        $contrato = DB::table('contrato')
        ->join('trabajadores', 'contrato.cod_trabajador', '=', 'trabajadores.codigo')
        ->join('canero', 'contrato.cod_canero', '=', 'canero.cod_canero')
        ->selectRaw('contrato.*, trabajadores.*, canero.nombre as canero, trabajadores.nombre as trabajador, IF(contrato.incentivo = "1", "Si", "No") as incentivob, IF(contrato.viatico = "1", "Si", "No") as viaticob')
        ->where('contrato.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->where('trabajadores.indicador', '=', 'A')
        ->where('contrato.codigo', '=' , $request->id)
        ->get();

        $pdf = \PDF::loadView('admin\contrato\pdf-contrato-trab', compact('contrato'))->setPaper('letter');
        //return $pdf->download('contrato.pdf');
        return $pdf->stream('contrato.pdf');
    }
}
