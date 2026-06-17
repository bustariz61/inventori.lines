<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
    return view('Vistas.login');

    }
//Funcion para validar el login 
    public function recibirDatosLogin(Request $request){

        $usuario = Usuario::where('usuario', '=', $request->usuario)->where('contraseña', '=', $request->contraseña)->get();
        if ($usuario->isEmpty()) {
            $errorMessage = "Usuario o contraseña incorrecta";
        Session::flash('errorMessage', $errorMessage);
            return back();
        }else {
            return view('Vistas.dashboard');
        }        

    }

    public function vistaRegistro(){
        return view('Vistas.registro');
    }


    public function registrar(Request $request){
        $registro = new Usuario();
        $registro->usuario = $request->nombre;
        $registro->contraseña = $request->contraseña;
        $registro->status = 'activo';
        if($registro->contraseña==$request->confirmar_contraseña){
            $registro->save();
            if($registro->save())
            return view('Vistas.dashboard');
        }

    }

    public function contraseñaOlvidada(){
        return view('Vistas.recuperarContraseña');
    }
}


/*foreach ($usuario as $user) {
            //return $user->usuario; // Accessing the 'usuario' attribute of each model
            echo $user->contrasenia, $user->usuario; // Accessing the 'contrasenia' attribute of each model
            // Perform additional operations or validations here
        }*/
        //$q = DB::getQueryLog();
        //dd ($q, $usuario);
        //dd ($usuario);
        /*if ($usuario->usuario==$request->usuario && $usuario->contraseña==$request->contraseña){
            return "Bienvenide";
        }*/
        //$usuario = Usuario::find(['usuario'=>$request->usuario,'contrasenia'=> $request->contraseña]);
        //$usuario = DB::table('usuario')->where(['usuario'=> $request->usuario, 'contrasenia' => $request->contraseña]);//where('usuario', $request->usuario)->where('contraseña', $request->contraseña)->get();
        //DB::enableQueryLog();

        //dxfgdfg<div align="center" class="alert alert-warning">dfgd
    //</div>*/