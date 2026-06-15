<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function mostrarDepartamentos(){
        return view('Vistas.Departamentos.departamentos');

    
    }

    public function crearDepartamento(){
        return view('Vistas.Departamentos.crearDepartamento');
    }

    public function guardarDepartamento(Request $request){
        $datos = new  Departamento();
        $datos->nombre = $request->nombre;
        //return $request->all();
        $datos->save();
        return view('Vistas.Departamentos.departamentos');
    }
}
