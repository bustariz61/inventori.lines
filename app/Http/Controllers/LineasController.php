<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Linea;
use App\Models\Retiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class LineasController extends Controller
{
    public function mostrarLineas(){
        $linea = DB::table('lineas as a')
          ->select('a.id','a.linea', 'a.codigo_pug', 'a.codigo_barra')
         // ->where('a.status', '=', 'libre')
          ->get();
       // dd ($persona);

        return view('Vistas.Lineas.lineas', ['linea'=> $linea ]);
    }
    
    public function registrarLinea(){
        return view('Vistas.Lineas.registroLineas');
        
    }

    public function guardarLinea(Request $request){
        $rules = [
            'linea' => 'required|min:10|max:11',
            'codigo_pug' => 'required',
            'codigo_barra' => 'required',
        ];

        $messages = [
            'linea.required' => 'La linea es requerida',
            'codigo_pug.required' => 'La Cédula debe de tener mínimo 7 caracteres',
            'codigo_barra.required' => 'La Cédula debe de tener máximo 8 caracteres',
        ];

        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error.')->with('typealert', 'danger');
        else:

        $datos = new Linea();
        $datos->linea = $request->linea;
        $datos->codigo_pug = $request->codigo_pug;
        $datos->codigo_barra = $request->codigo_barra;
        $datos->status = 'libre';
        $datos->save();
        if($datos->save()):
            return back()->with('success', 'La persona se registró con éxito')->with('typealert', 'primary');
        endif;
    endif;


    }

    public function edit($id){
    $linea = Linea::find($id);
    return view('Vistas.Lineas.editarLinea', compact('linea'));

     
    }

    public function update(Request $request, $id){
    $linea = Linea::findOrFail($id);
    $linea->linea = $request->input('linea');
    $linea->codigo_pug = $request->input('codigo_pug');
    $linea->codigo_barra = $request->input('codigo_barra');
    $linea->save();

    return redirect()->route('lineas.mostrarLineas', $linea->id)->with('success', 'Persona updated successfully!');
}

}
