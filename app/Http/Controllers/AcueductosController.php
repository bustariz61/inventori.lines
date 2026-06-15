<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcueductosController extends Controller
{
    public function mostrarAcueductos(){
        return view('Vistas.registroAcueductos');
    }

    public function mostrarEspecialidades(){
        return view('Vistas.especialidades');
    }
}
