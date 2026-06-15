<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\PersonaLinea;
use App\Models\Retiro;
use App\Models\Telefonia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Redirect;


class RetirosController extends Controller{

    public function buscarPersona(){
        DB::enableQueryLog();
        $filtroCedula = $_POST['filtroCedula'];
        $filtroNombre = strtoupper($_POST['filtroNombre']);
        $filtroApellido = strtoupper($_POST['filtroApellido']);

        $persona = DB::connection('pgsql2')
                            ->table('sno_personal as p')->distinct(['p.cedper'])
                            ->join('sno_personalnomina as pn','p.codper','pn.codper')
                            ->join('sno_ubicacionfisica as uf','pn.codubifis','uf.codubifis')
                            ->join('sno_asignacioncargo as ac', 'pn.codasicar','ac.codasicar')
                            ->join('sno_unidadadmin as ua',function($join){
                                $join->on('pn.ofiuniadm','=','ua.ofiuniadm')
                                     ->on('pn.uniuniadm','=','ua.uniuniadm')
                                     ->on('pn.depuniadm','=','ua.depuniadm')
                                     ->on('pn.prouniadm','=','ua.prouniadm')
                                     ->on('pn.minorguniadm','=','ua.minorguniadm');
                            })
                            //->join('sno_unidadadmin as ua','pn.ofiuniadm','ua.ofiuniadm')
                            ->where('pn.codnom','8003');
                            if($filtroCedula != ''){
                                $persona = $persona->where('pn.codper','like','%'.$filtroCedula.'%');
                            }
                            if($filtroNombre != ''){
                                $persona = $persona->where('p.nomper','like','%'.$filtroNombre.'%');
                            }
                            if($filtroApellido != ''){
                                $persona = $persona->where('p.apeper','like','%'.$filtroApellido.'%');
                            }
                            $persona  = $persona->select('p.cedper',
                                                         'p.nomper',
                                                         'p.apeper',
                                                         'uf.desubifis',
                                                         'ac.denasicar',
                                                         'ua.desuniadm',
                                                         // 'ua.minorguniadm',
                                                         // 'ua.ofiuniadm',
                                                         // 'ua.uniuniadm',
                                                         // 'ua.depuniadm',
                                                         // 'ua.prouniadm',
                                                        )->get();
        return $persona;
    }

    public function mostrarRetiros(){
        $linea = DB::table('persona_linea as a')
        ->join('telefonias as b', 'b.id', '=', 'a.telefonia')
          ->select('a.id',
           'a.segunda_cedula',
            'a.segundo_nombre',
             'a.segundo_apellido',
              'a.fecha',
               'a.segunda_ubicacion',
                'a.segundo_cargo',
                 'a.segundo_acueducto',
                  'a.segundo_departamento',
                  'a.numero_linea',
                  'a.numero_sim',
                  'b.nombre',
                   'a.status',)
                   ->where('a.status', '=', 'entregado')
          ->get();
    return view('Vistas.Retiros.lineas', ['linea'=> $linea ]);

    }

    public function registrarRetiro(){
        $telefonia = Telefonia::pluck('nombre', 'id');
        return view('Vistas.Retiros.registroLinea', compact('telefonia'));
    }


    public function guardarRetiro(Request $request){
        $datos = new Retiro();
        $datos->cedula = $request->cedula;
        $datos->primer_nombre = $request->primer_nombre;
        $datos->primer_apellido = $request->primer_apellido;
        $datos->fecha = $request->fecha;
        $datos->ubicacion = $request->ubicacion;
        $datos->cargo = $request->cargo;
        $datos->acueducto = $request->acueducto;
        $datos->departamento = $request->departamento;
        $datos->tipo_retiro = 'linea';
        $datos->status = 'entregado';
        $datos->save();
        if($datos->save()):

        //Obtener los datos arreglo de los campos    
        $segunda_cedula = $request->input('segunda_cedula');
        $segundo_nombre = $request->input('segundo_nombre');
        $segundo_apellido = $request->input('segundo_apellido');
        $fecha = $request->input('fecha2');
        $segunda_ubicacion = $request->input('segunda_ubicacion');
        $segundo_cargo = $request->input('segundo_cargo');
        $segundo_acueducto = $request->input('segundo_acueducto');
        $segundo_departamento = $request->input('segundo_departamento');
        $numero_linea = $request->input('numero_linea');
        $numero_sim = $request->input('numero_sim');
        $telefonia = $request->input('telefonia');


    
       //dd ($cedula, $primer_nombre, $primer_apellido, $telefono_ubicacion, $ubicacion, $cargo, $acueducto, $departamento, $numero_linea, $numero_sim);

        
        // Loop through the dynamic fields and save them
        for ($i = 1; $i <= count($segunda_cedula)-1; $i++) {
            $camposDinamicos = new PersonaLinea();
            $camposDinamicos->segunda_cedula = $segunda_cedula[$i];
            $camposDinamicos->segundo_nombre = $segundo_nombre[$i];
            $camposDinamicos->segundo_apellido = $segundo_apellido[$i];
            $camposDinamicos->fecha = $fecha[$i];
            $camposDinamicos->segunda_ubicacion = $segunda_ubicacion[$i];
            $camposDinamicos->segundo_cargo = $segundo_cargo[$i];
            $camposDinamicos->segundo_acueducto = $segundo_acueducto[$i];
            $camposDinamicos->segundo_departamento = $segundo_departamento[$i];
            $camposDinamicos->numero_linea = $numero_linea[$i];
            $camposDinamicos->numero_sim = $numero_sim[$i];
            $camposDinamicos->telefonia = $telefonia[$i];
            $camposDinamicos->id_retiro = $datos->id;
            $camposDinamicos->status = 'entregado';
            $camposDinamicos->save();
        }
            return back()->with('success', 'La persona se registró con éxito')->with('typealert', 'primary');
    endif;

    }

    public function mostrarDetalle($id){
        $retiro = Retiro::find($id);
        if($retiro->tipo_retiro=='linea'){
            $detalle = db::table('retiros as b')
        ->join('persona_linea as a', 'a.id_retiro', '=', 'b.id')
        ->join('telefonias as c', 'c.id', '=', 'a.telefonia')
        ->where('a.id_retiro', $id)
        ->where('a.status', '=', 'entregado')
        ->select('a.id', 'a.segunda_cedula', 'a.segundo_nombre', 'a.segundo_apellido', 'a.fecha as fecha2', 'a.segunda_ubicacion', 'a.segundo_cargo',
         'a.segundo_acueducto', 'a.segundo_departamento', 'a.numero_linea', 'a.numero_sim', 'a.status', 'a.telefonia', 'c.nombre as nombre_telefonia',
         'b.cedula', 'b.primer_nombre', 'b.primer_apellido', 'b.fecha', 'b.ubicacion', 'b.cargo', 'b.acueducto', 'departamento')
        ->get();
        return view('Vistas.Retiros.detalleRetiro', ['detalle'=> $detalle ]);
        }else{
            $detalle = db::table('retiros as b')
        ->join('persona_telefono as a', 'a.id_retiro', '=', 'b.id')
        ->where('a.id_retiro', $id)
        ->where('a.status', '=', 'entregado')
        ->select('a.id', 'a.segunda_cedula', 'a.segundo_nombre', 'a.segundo_apellido', 'a.segundo_telefono', 'a.segunda_ubicacion', 'a.segundo_cargo',
         'a.segundo_acueducto', 'a.segundo_departamento', 'a.marca', 'a.color', 'a.serial', 'a.cargador', 'a.protector_pantalla', 'a.forro', 'a.status', 'a.activo', 'a.imei1', 'a.imei2')
        ->get();
        return view('Vistas.Retiros.detalleRetiroTelefono', ['detalle'=> $detalle ]);
        }

       
    }


    public function editarDetalleRetiro($id){
        $detalle = PersonaLinea::find($id);
        return view('Vistas.Retiros.editarDetalleRetiro', compact('detalle'));
    }


    public function edit($id){
    $retiro = Retiro::find($id);
    return view('Vistas.Retiros.editarRetiro', compact('retiro'));

     
    }

    public function updateDetalle(Request $request, $id){
    $detalle = PersonaLinea::findOrFail($id);
    $detalle->segunda_cedula = $request->input('segunda_cedula');
    $detalle->segundo_nombre = $request->input('segundo_nombre');
    $detalle->segundo_apellido = $request->input('segundo_apellido');
    $detalle->fecha = $request->input('fecha');
    $detalle->segunda_ubicacion = $request->input('segunda_ubicacion');
    $detalle->segundo_cargo = $request->input('segundo_cargo');
    $detalle->segundo_acueducto = $request->input('segundo_acueducto');
    $detalle->segundo_departamento = $request->input('segundo_departamento');
    $detalle->numero_linea = $request->input('numero_linea');
    $detalle->numero_sim = $request->input('numero_sim');
    $detalle->telefonia = $request->input('telefonia');
    
    $id_retiro = $detalle->id_retiro;
    $detalle->save();
    if($detalle->save())
    return redirect()->route('detalleRetiro.mostrarDetalle', $id_retiro)->with('success', 'Persona updated successfully!');
    }

    public function update(Request $request, $id){
    $retiro = Retiro::findOrFail($id);
    $retiro->cedula = $request->input('cedula');
    $retiro->primer_nombre = $request->input('primer_nombre');
    $retiro->primer_apellido = $request->input('primer_apellido');
    $retiro->fecha = $request->input('fecha');
    $retiro->ubicacion = $request->input('ubicacion');
    $retiro->cargo = $request->input('cargo');
    $retiro->acueducto = $request->input('acueducto');
    $retiro->departamento = $request->input('departamento');
    $retiro->save();
    
    $id_retiro = $retiro->id;

    return redirect()->route('retiros.mostrarRetiros', compact('id_retiro'))->with('success', 'Persona updated successfully!');
    }


    public function eliminarRetiro($id){
        $retiro = Retiro::findOrFail($id);
       /* $retiro->delete();
        if($retiro->delete())
        return redirect()->back();*/
        $retiro->status = 'inactivo';
        $retiro->save();
        if($retiro->save())
        return redirect()->route('retiros.mostrarRetiros');
    }

    public function eliminarDetalle($id){
        $detalle = PersonaLinea::findOrFail($id);
       /* $retiro->delete();
        if($retiro->delete())
        return redirect()->back();*/
        $detalle->status = 'inactivo';
        $detalle->save();
        if($detalle->save())
        return redirect()->route('detalleRetiro.mostrarDetalle', $detalle->id_retiro);
    }

   
    
    
    // funcion para imprimir pdf
    public function reti($id){
        $query = PersonaLinea::find($id);
        $oldFormat = $query->created_at;
        $fecha = $oldFormat->format('d-m-Y');
        $dia = substr($fecha,0,2);
        $mes = substr($fecha,3,2); 
        $detalle = db::table('persona_linea as a')
        ->join('retiros as b', 'b.id', '=', 'a.id_retiro')
        ->where('a.id', $id)
        ->select('a.segunda_cedula', 'a.segundo_nombre', 'a.segundo_apellido'
        , 'a.segunda_ubicacion', 'a.segundo_cargo',
         'a.segundo_acueducto', 'a.segundo_departamento', 'a.numero_linea',
          'a.numero_sim', 'a.status', 'b.cedula', 'b.cargo', 'b.ubicacion', 'a.telefonia')->get();
        $pdf = Pdf::loadView('Vistas.Retiros.retiropdf', ['detalle' =>$detalle], compact('dia', 'mes'));

        return $pdf->stream('retiropdf');
       
    }
}
