<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function contratoPDF(){
        $pdf = \PDF::loadView('admin\contrato\pdf-contrato')->setPaper('letter');
        //return $pdf->download('contrato.pdf');
        return $pdf->stream('contrato.pdf');
    }
}
