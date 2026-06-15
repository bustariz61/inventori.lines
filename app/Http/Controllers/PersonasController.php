<?php

namespace App\Http\Controllers;

use App\Models\Acueducto;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormsValidation;
use Illuminate\Support\Facades\Validator;


class PersonasController extends Controller
{   
   
    public function mostrarPersonas(){
        $persona = DB::table('personas as a')
          ->join('departamentos as b','b.id','=','a.id_departamento')
          ->join('cargos as c', 'c.id', '=', 'a.id_cargo')
          ->join('acueductos as d', 'd.id', '=', 'a.id_acueducto')
          ->select('a.id','a.cedula','a.nombre','a.apellido', 'a.telefono', 'a.telefono_ubicacion', 'a.ubicacion', 'b.nombre as nombre_departamento','c.nombre as nombre_cargo','d.nombre as nombre_acueducto')
          ->get();
       // dd ($persona);

        return view('Vistas.Personas.personas', ['persona'=> $persona ]);
          
        
    }

    public function crearPersona(){
        $departamento = Departamento::pluck('nombre', 'id');
        $cargo = Cargo::pluck('nombre', 'id');
        $acueducto = Acueducto::pluck('nombre', 'id');


        return view('Vistas.Personas.registroPersonas', compact('departamento', 'cargo', 'acueducto'));
    }

    public function guardarPersona(Request $request){
        $rules = [
            'cedula' => 'required|min:7|max:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required|min:10|max:11',
            'telefono_ubicacion' => 'required|min:10|max:11',
            'ubicacion'=> 'required|max:50',
        ];

        $messages = [
            'cedula.required' => 'Su Cédula es requerida',
            'cedula.min' => 'La Cédula debe de tener mínimo 7 caracteres',
            'cedula.max' => 'La Cédula debe de tener máximo 8 caracteres',
            'cedula.unique' => 'Ya existe un usuario usando esta cédula',
            'nombre.required' => 'Su Nombre es requerido',
            'apellido.required' => 'Su Apellido es requerido',
            'telefono.required' => 'Su telefono es requerido',
            'telefono.min' => 'Su telefono debe tener minímo 10 caracteres',
            'telefono.max' => 'Su telefono debe tener máximo 11 caracteres',
            'telefono_ubicacion.max' => 'Su telefono debe tener máximo 11 caracteres',
            'telefono_ubicacion.min' => 'Su telefono debe tener minimo 11 caracteres',
            'telefono_ubicacion.required' => 'Su telefono debe tener máximo 11 caracteres',
        ];

        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error.')->with('typealert', 'danger');
        else:

        $datos = new Persona();
        $datos->cedula = $request->cedula;
        $datos->nombre = $request->nombre;
        $datos->apellido = $request->apellido;
        $datos->telefono = $request->telefono;
        $datos->telefono_ubicacion = $request->telefono_ubicacion;
        $datos->ubicacion = $request->ubicacion;
        $datos->id_departamento = $request->departamento;
        $datos->id_cargo = $request->cargo;
        $datos->id_acueducto = $request->acueducto;
        $datos->status = 'activo';
        $datos->save();
        if($datos->save()):
            return back()->with('success', 'La persona se registró con éxito')->with('typealert', 'primary');
        endif;
    endif;


    }

    public function edit($id){
    $departamento = Departamento::pluck('nombre', 'id');
    $cargo = Cargo::pluck('nombre', 'id');
    $acueducto = Acueducto::pluck('nombre', 'id');
        
    $persona = Persona::find($id);
    return view('Vistas.Personas.editarPersona', compact('persona', 'departamento', 'cargo', 'acueducto'));

     
    }

    public function update(Request $request, $id){
    $persona = Persona::findOrFail($id);
    $persona->cedula = $request->input('cedula');
    $persona->nombre = $request->input('nombre');
    $persona->apellido = $request->input('apellido');
    $persona->telefono = $request->input('telefono');
    $persona->telefono_ubicacion = $request->input('telefono_ubicacion');
    $persona->ubicacion = $request->input('ubicacion');
    $persona->id_departamento = $request->input('departamento');
    $persona->id_cargo = $request->input('cargo');
    $persona->id_acueducto = $request->input('acueducto');
    $persona->save();

    return redirect()->route('personas.mostrarPersonas', $persona->id)->with('success', 'Persona updated successfully!');
}
}
