<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelosController extends Controller
{
    public function mostrarModelos(){
        return view('Vistas.registroModelos');
    }
}

