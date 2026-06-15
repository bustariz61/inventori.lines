<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\PersonaLinea;
use App\Models\PersonaTelefono;
use App\Models\Retiro;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class RetirosTelefonosController extends Controller
{

    public function registrarRetiroTelefono(){
        return view('Vistas.Retiros.registroRetiroTelefono');
    }

    public function guardarRetiroTelefono(Request $request){
       /* $rules = [
            'cedula' => 'required|min:7|max:8',
            'primer_apellido' => 'required',
            'primer_nombre' => 'required',
            'telefono_ubicacion' => 'required|min:10|max:11',
            'ubicacion'=> 'required|max:50',
            'cargo' => 'required|max:50',
            'acueducto' => 'required|max:50',
            'departamento' => 'required|max:50',

           // 'segunda_cedula.*' => 'required',
           'segundo_nombre' => 'required',
            'segundo_apellido' => 'required',
            'segundo_telefono' => 'required',
            'segunda_ubicacion'=> 'required',
            'segundo_cargo' => 'required',
            'segundo_acueducto' => 'required',
            'segundo_departamento' => 'required',
            'numero_linea' => 'required',
            'numero_sim' => 'required',
        ];

        $messages = [
            'cedula.required' => 'Su Cédula es requerida',
            'cedula.min' => 'La Cédula debe de tener mínimo 7 caracteres',
            'cedula.max' => 'La Cédula debe de tener máximo 8 caracteres',
            'primer_nombre.required' => 'El nombre es requerido',
            'primer_apellido.required' => 'El apellido es requerido',
            'telefono_ubicacion.required' => 'El telefono es requerido',
            'telefono_ubicacion.min' => 'El telefono tiene que tener minimo 10 caracteres',
            'telefono_ubicacion.max' => 'El telefono tiene que tener maximo 11 caracteres',
            'ubicacion.required' => 'La ubicacion es requerida',
            'ubicacion.max' => 'La ubicacion no puede tener mas de 50 caracteres',
            'cargo.required' => 'El cargo es requerido',
            'cargo.max' => 'El cargo no puede tener mas de 50 caracteres',
            'acueducto.required' => 'El acueducto es requerido',
            'acueducto.max' => 'El acueducto no puede tener mas de 50 caracteres',
            'departamento.required' => 'EL departamento es requerido',
            'departamento.max' => 'El departamento no puede tener mas de 50 caracteres',

            //'segunda_cedula.required' => 'Su Cédula es requerida',
           // 'segunda_cedula.min' => 'La Cédula debe de tener mínimo 7 caracteres',
            //'segunda_cedula.max' => 'La Cédula debe de tener máximo 8 caracteres',
            /*'segundo_nombre.required' => 'El nombre es requerido',
            'segundo_apellido.required' => 'El apellido es requerido',
            'segundo_telefono.required' => 'El telefono es requerido',
            //'segundo_telefono.min' => 'El telefono tiene que tener minimo 10 caracteres',
            //'segundo_telefono.max' => 'El telefono tiene que tener maximo 11 caracteres',
            //'segunda_ubicacion.required' => 'La ubicacion es requerida',
            //'segunda_ubicacion.max' => 'La ubicacion no puede tener mas de 50 caracteres',
            'segundo_cargo.required' => 'El cargo es requerido',
            //'segundo_cargo.max' => 'El cargo no puede tener mas de 50 caracteres',
            'segundo_acueducto.required' => 'El acueducto es requerido',
            //'segundo_acueducto.max' => 'El acueducto no puede tener mas de 50 caracteres',
            'segundo_departamento.required' => 'EL departamento es requerido',
            //'segundo_departamento.max' => 'El departamento no puede tener mas de 50 caracteres',
            'numero_linea.required' => 'El numero de linea es requerida',
            //'numero_linea.max' => 'El numero de linea no puede tener mas de 50 caracteres',
            'numero_sim.required' => 'El numero de sim es requerida',
            //'numero_sim.max' => 'El numero de simno puede tener mas de 50 caracteres',
        ];

        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error.')->with('typealert', 'danger');
        else:*/


        $datos = new Retiro();
        $datos->cedula = $request->cedula;
        $datos->primer_nombre = $request->primer_nombre;
        $datos->primer_apellido = $request->primer_apellido;
        $datos->telefono_ubicacion = $request->telefono_ubicacion;
        $datos->ubicacion = $request->ubicacion;
        $datos->cargo = $request->cargo;
        $datos->acueducto = $request->acueducto;
        $datos->departamento = $request->departamento;
        $datos->tipo_retiro = 'telefono';
        $datos->status = 'entregado';
        $datos->save();
        if($datos->save()):

        //Obtener los datos arreglo de los campos    
        $segunda_cedula = $request->input('segunda_cedula');
        $segundo_nombre = $request->input('segundo_nombre');
        $segundo_apellido = $request->input('segundo_apellido');
        $segundo_telefono = $request->input('segundo_telefono');
        $segunda_ubicacion = $request->input('segunda_ubicacion');
        $segundo_cargo = $request->input('segundo_cargo');
        $segundo_acueducto = $request->input('segundo_acueducto');
        $segundo_departamento = $request->input('segundo_departamento');
        $marca = $request->input('marca');
        $color = $request->input('color');
        $serial = $request->input('serial');
        $cargador = $request->input('cargador');
        $protector_pantalla = $request->input('protector_pantalla');
        $forro = $request->input('forro');
        $activo = $request->input('activo');
        $imei1 = $request->input('imei1');
        $imei2 = $request->input('imei2');
       //dd ($cedula, $primer_nombre, $primer_apellido, $telefono_ubicacion, $ubicacion, $cargo, $acueducto, $departamento, $numero_linea, $numero_sim);

        
        // Loop through the dynamic fields and save them
        for ($i = 1; $i <= count($segunda_cedula)-1; $i++) {
            $camposDinamicos = new PersonaTelefono();
            $camposDinamicos->segunda_cedula = $segunda_cedula[$i];
            $camposDinamicos->segundo_nombre = $segundo_nombre[$i];
            $camposDinamicos->segundo_apellido = $segundo_apellido[$i];
            $camposDinamicos->segundo_telefono = $segundo_telefono[$i];
            $camposDinamicos->segunda_ubicacion = $segunda_ubicacion[$i];
            $camposDinamicos->segundo_cargo = $segundo_cargo[$i];
            $camposDinamicos->segundo_acueducto = $segundo_acueducto[$i];
            $camposDinamicos->segundo_departamento = $segundo_departamento[$i];
            $camposDinamicos->marca = $marca[$i];
            $camposDinamicos->color = $color[$i];
            $camposDinamicos->serial = $serial[$i];
            $camposDinamicos->cargador = $cargador[$i];
            $camposDinamicos->protector_pantalla = $protector_pantalla[$i];
            $camposDinamicos->forro = $forro[$i];
            $camposDinamicos->activo = $activo[$i];
            $camposDinamicos->imei1 = $imei1[$i];
            $camposDinamicos->imei2 = $imei2[$i];
            $camposDinamicos->id_retiro = $datos->id;
            $camposDinamicos->status = 'entregado';
            $camposDinamicos->save();
        }
            return back()->with('success', 'La persona se registró con éxito')->with('typealert', 'primary');
        endif;
   // endif;
    
    }



    public function editarDetalleRetiroTelefono($id){
        $detalle = PersonaTelefono::find($id);
        return view('Vistas.Retiros.editarDetalleRetiroTelefono', compact('detalle'));
    }



    public function update(Request $request, $id){
    $retiro = Retiro::findOrFail($id);
    $retiro->cedula = $request->input('cedula');
    $retiro->primer_nombre = $request->input('primer_nombre');
    $retiro->primer_apellido = $request->input('primer_apellido');
    $retiro->telefono_ubicacion = $request->input('telefono_ubicacion');
    $retiro->ubicacion = $request->input('ubicacion');
    $retiro->cargo = $request->input('cargo');
    $retiro->acueducto = $request->input('acueducto');
    $retiro->numero_linea = $request->input('numero_linea');
    $retiro->numero_sim = $request->input('numero_sim');
    $retiro->retirado_por = $request->input('retirado_por');
    $retiro->departamento_solicitante = $request->input('departamento_solicitante');
    $retiro->segundo_nombre = $request->input('segundo_nombre');
    $retiro->segundo_apellido = $request->input('segundo_apellido');
    $retiro->departamento = $request->input('departamento');
    $retiro->persona_solicitante = $request->input('persona_solicitante');
    $retiro->save();

    return redirect()->route('retiros.mostrarRetiros', $retiro->id)->with('success', 'Persona updated successfully!');
    }

    public function updateDetalle(Request $request, $id){
        $detalle = PersonaTelefono::findOrFail($id);
        $detalle->segunda_cedula = $request->input('segunda_cedula');
        $detalle->segundo_nombre = $request->input('segundo_nombre');
        $detalle->segundo_apellido = $request->input('segundo_apellido');
        $detalle->segundo_telefono = $request->input('segundo_telefono');
        $detalle->segunda_ubicacion = $request->input('segunda_ubicacion');
        $detalle->segundo_cargo = $request->input('segundo_cargo');
        $detalle->segundo_acueducto = $request->input('segundo_acueducto');
        $detalle->segundo_departamento = $request->input('segundo_departamento');
        $detalle->marca = $request->input('marca');
        $detalle->color = $request->input('color');
        $detalle->serial = $request->input('serial');
        $detalle->cargador = $request->input('cargador');
        $detalle->protector_pantalla = $request->input('protector_pantalla');
        $detalle->forro = $request->input('forro');
        $detalle->activo = $request->input('activo');
        $detalle->imei1 = $request->input('imei1');
        $detalle->imei2 = $request->input('imei2');
        $id_retiro = $detalle->id_retiro;
        $detalle->save();
        if($detalle->save())
        return redirect()->route('detalleRetiro.mostrarDetalle', $id_retiro)->with('success', 'Persona updated successfully!');
        }

        public function eliminarDetalleTelefono($id){
            $detalle = PersonaTelefono::findOrFail($id);
           /* $retiro->delete();
            if($retiro->delete())
            return redirect()->back();*/
            $detalle->status = 'inactivo';
            $detalle->save();
            if($detalle->save())
            return redirect()->route('detalleRetiro.mostrarDetalle', $detalle->id_retiro);
        }

   
    
    
    /* funcion para imprimir pdf*/
    public function reti($id){
        $query = PersonaTelefono::find($id);
        $cedula = $query->segunda_cedula;
        $relacion = db::table('persona_linea as a')
        ->where('segunda_cedula', $cedula)
        ->select('a.numero_linea', 'a.numero_sim')
        ->get();
      //  dd ($relacion);
        $oldFormat = $query->created_at;
        $fecha = $oldFormat->format('d-m-Y');
        $dia = substr($fecha,0,2);
        $mes = substr($fecha,3,2); 
        $detalle = db::table('persona_telefono as a')
        ->join('retiros as b', 'b.id', '=', 'a.id_retiro')
        ->join('persona_linea as c', 'c.segunda_cedula', '=', 'a.segunda_cedula')
        ->where('a.id', $id)
        ->select('a.segunda_cedula', 'a.segundo_nombre', 'a.segundo_apellido',
         'a.segundo_telefono', 'a.segunda_ubicacion', 'a.segundo_cargo',
         'a.segundo_acueducto', 'a.segundo_departamento', 'a.marca', 'a.color',
          'a.serial', 'a.cargador', 'a.protector_pantalla', 'a.forro', 'a.status', 'a.activo', 'a.imei1', 'a.imei2', 'c.numero_linea', 'c.numero_sim')
        ->get();
        //dd ($detalle);
        $pdf = Pdf::loadView('Vistas.Retiros.retiroPdfTelefono', ['detalle' => $detalle], compact('dia', 'mes'));

         return $pdf->stream('retiroPdfTelefono');

      //  $pdf = Pdf::loadView('Vistas.Retiros.retiroPdfTelefono', ['retiro' => $retiro], ['detalle' =>$detalle]);

        //return $pdf->stream('retiroPdfTelefono');
    }
}
