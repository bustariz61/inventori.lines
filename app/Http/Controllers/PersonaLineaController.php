<?php

namespace App\Http\Controllers;

use App\Models\PersonaLinea;
use Illuminate\Http\Request;

class PersonaLineaController extends Controller
{
    public function guardarPersonaLinea(Request $request){
        $datos = new PersonaLinea();
        $datos->cedula = $request->cedula;
        $datos->primer_nombre = $request->primer_nombre;
        $datos->primer_apellido = $request->primer_apellido;
        $datos->telefono_ubicacion = $request->telefono_ubicacion;
        $datos->ubicacion = $request->ubicacion;
        $datos->cargo = $request->cargo;
        $datos->acueducto = $request->acueducto;
        $datos->departamento = $request->departamento;
        $datos->status = 'entregado';

    }
}
