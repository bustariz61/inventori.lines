<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function mostrarEspecialidad(){
        return view('Vistas.crearEspecialidad');
    }
}
