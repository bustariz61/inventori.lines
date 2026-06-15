<?php

namespace App\Http\Controllers;

use App\Models\ComunicacionInterna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ComunicacionInternaController extends Controller
{
    public function mostrarComunicacionInterna(){
        $comunicacion = db::table('comunicacion_interna as a')
        ->select('*')
        ->where('status', '=', 'xd')
        ->get();
        return view('Vistas.ComunicacionInterna.comunicacionInterna', ['comunicacion' => $comunicacion]);
    }

    public function registrarComunicacionInterna(){
        return view('Vistas.ComunicacionInterna.registroComunicacionInterna');
    }

    public function guardarComunicacionInterna(Request $request){
        $datos = new ComunicacionInterna();
        $datos->para = $request->para;
        $datos->de = $request->de;
        $datos->cc = $request->cc;
        $datos->asunto = $request->asunto;
        $datos->texto = $request->texto;
        $datos->status = 'xd';
        $datos->save();
        if($datos->save())
        return back();
    }

    public function edit($id){
        $comunicacion = ComunicacionInterna::find($id);
        return view('Vistas.ComunicacionInterna.editarComunicacionInterna', compact('comunicacion'));
    
         
        }

    public function update(Request $request, $id){
        $comunicacion = ComunicacionInterna::findOrFail($id);            
        $comunicacion->para = $request->input('para');
        $comunicacion->de = $request->input('de');
        $comunicacion->cc = $request->input('cc');
        $comunicacion->asunto = $request->input('asunto');
        $comunicacion->texto = $request->input('texto');
        $comunicacion->save();
        
        return redirect()->route('comunicacionInterna.mostrarComunicacionInterna');
    }

    public function eliminarComunicacion($id){
        $comunicacion = ComunicacionInterna::findOrFail($id);
        $comunicacion->status = 'cancelada';
        $comunicacion->save();
        if($comunicacion->save())
        return back();
    }

    function mostrarPdf($id){
        $comunicacion = ComunicacionInterna::find($id);
        $query = ComunicacionInterna::find($id);
        $oldFormat = $query->created_at;
        $fecha = $oldFormat->format('d-m-Y');
        $dia = substr($fecha,0,2);
        $mes = substr($fecha,3,2); 
        $pdf = Pdf::loadView('Vistas.ComunicacionInterna.pdfComunicacionInterna', compact('fecha', 'comunicacion'));

        return $pdf->stream('pdfComunicacionInterna');
    }
}
