<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function liquidacion(){
        $fecha = date("Y-m-d");
        
        $contrato = DB::table('contrato')
        ->join('trabajadores', 'contrato.cod_trabajador', '=', 'trabajadores.codigo')
        ->join('canero', 'contrato.cod_canero', '=', 'canero.cod_canero')
        ->select('contrato.*', 'canero.nombre as canero', 'trabajadores.nombre as trabajador', 
        DB::raw('DATEDIFF(CURDATE(), contrato.fecha_inicio) as dias_trab'), DB::raw('(DATEDIFF(CURDATE(), contrato.fecha_inicio)-contrato.faltas) as dias_tot'), DB::raw('(DATEDIFF(CURDATE(), contrato.fecha_inicio)/30.5) as mes_trab'),
        DB::raw('cast((contrato.sueldo + contrato.monto_incentivo) * (DATEDIFF(CURDATE(), contrato.fecha_inicio)/30.5) as decimal(12,2)) +  (contrato.monto_viaje * IFNULL((select count(*) from entrega where cod_trabajador =trabajadores.codigo and entrega.indicador="A"),0)) as trab'),
        DB::raw('IFNULL((select sum(monto) from pago where cod_contrato =contrato.codigo and pago.indicador="A"),0) as pedidos'),
        DB::raw('cast((contrato.sueldo + contrato.monto_incentivo) * (DATEDIFF(CURDATE(), contrato.fecha_inicio)/30.5) + (contrato.monto_viaje * IFNULL((select count(*) from entrega where cod_trabajador =trabajadores.codigo and entrega.indicador="A"),0)) - IFNULL((select sum(monto) from pago where cod_contrato =contrato.codigo and pago.indicador="A"),0)as decimal(12,2)) as saldo'),
        DB::raw('cast((contrato.sueldo/12) * (DATEDIFF(CURDATE(), contrato.fecha_inicio)/30.5) as decimal(12,2)) as aguinaldo'),
        DB::raw('cast((contrato.sueldo + contrato.monto_incentivo ) * (DATEDIFF(CURDATE(), contrato.fecha_inicio)/30.5) + (contrato.monto_viaje * IFNULL((select count(*) from entrega where cod_trabajador =trabajadores.codigo and entrega.indicador="A"),0)) - IFNULL((select sum(monto) from pago where cod_contrato =contrato.codigo and pago.indicador="A"),0) + ((contrato.sueldo/12) * (DATEDIFF(CURDATE(), contrato.fecha_inicio)/30.5)*2) as decimal(12,2)) as total'))
        ->where('contrato.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->where('trabajadores.indicador', '=', 'A')
        ->get();


        return view('admin\reportes\liquidacion', compact('contrato'));
    }
    public function liquidacionTotal(){
        $fecha = date("Y-m-d");
        
        $contrato = DB::table('contrato')
        ->join('trabajadores', 'contrato.cod_trabajador', '=', 'trabajadores.codigo')
        ->join('canero', 'contrato.cod_canero', '=', 'canero.cod_canero')
        ->select('contrato.*', 'canero.nombre as canero', 'trabajadores.nombre as trabajador', 
        DB::raw('DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio) as dias_trab'), DB::raw('(DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio)-contrato.faltas) as dias_tot'), DB::raw('(DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio)/30.5) as mes_trab'),
        DB::raw('cast((contrato.sueldo + contrato.monto_incentivo + contrato.monto_viaje) * (DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio)/30.5) as decimal(12,2)) as trab'),
        DB::raw('IFNULL((select sum(monto) from pago where cod_contrato =contrato.codigo and pago.indicador="A"),0) as pedidos'),
        DB::raw('cast((contrato.sueldo + contrato.monto_incentivo + contrato.monto_viaje) * (DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio)/30.5) - IFNULL((select sum(monto) from pago where cod_contrato =contrato.codigo and pago.indicador="A"),0)as decimal(12,2)) as saldo'),
        DB::raw('cast((contrato.sueldo/12) * (DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio)/30.5) as decimal(12,2)) as aguinaldo'),
        DB::raw('cast((contrato.sueldo + contrato.monto_incentivo + contrato.monto_viaje) * (DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio)/30.5) - IFNULL((select sum(monto) from pago where cod_contrato =contrato.codigo and pago.indicador="A"),0) + ((contrato.sueldo/12) * (DATEDIFF(contrato.fecha_fin, contrato.fecha_inicio)/30.5)*2) as decimal(12,2)) as total'))
        ->where('contrato.indicador', '=', 'A')
        ->where('canero.indicador', '=', 'A')
        ->where('trabajadores.indicador', '=', 'A')
        ->get();


        return view('admin\reportes\liquidaciontotal', compact('contrato'));
    }
}
