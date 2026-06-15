<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function mostrarMarcas(){
        return view('Vistas.registroMarcas');
    }
}
