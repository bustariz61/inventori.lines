<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UbicacionesController extends Controller
{
    public function mostrarUbicaciones(){
        return view('Vistas.registroUbicaciones');
    }
}
