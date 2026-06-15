<?php

namespace App\Http\Controllers;

use App\Models\PersonaLinea;
use App\Models\PersonaBam;
use App\Models\Retiro;
use App\Models\Telefonia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EntregaLineasExcel;

class EntregaBamsController extends Controller
{
    public function mostrar(){
        $entrega = DB::table('persona_bam as a')
        ->join('retiros as b', 'b.id', '=', 'a.id_retiro')
          ->select('a.id',
           'a.segunda_cedula',
            'a.segundo_nombre',
             'a.segundo_apellido',
              'a.fecha',
               'a.segunda_ubicacion',
                'a.segundo_cargo',
                 'a.segundo_acueducto',
                  'a.segundo_departamento',
                  'a.sim',
                  'a.marca',
                  'a.modelo',
                  'a.imeil',
                  'a.serial',
                  'a.nroBien',
                  'a.antena',
                  'a.fecha',
                   'a.status', 'b.cedula', 'b.primer_nombre', 'b.primer_apellido')
                   ->where('a.status', '=', 'entregado')
          ->get();
          
    return view('Vistas.Bams.mostrar', ['entrega'=> $entrega ]);

    }
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

    public function registrar(){
        return view('Vistas.Bams.registrar');
    }


    public function guardar(Request $request){
        $datos = new Retiro();
        $datos->cedula = $request->cedula;
        $datos->primer_nombre = $request->primer_nombre;
        $datos->primer_apellido = $request->primer_apellido;
        $datos->ubicacion = $request->ubicacion;
        $datos->cargo = $request->cargo;
        $datos->acueducto = $request->acueducto;
        $datos->departamento = $request->departamento;
        $datos->fecha = $request->fecha;
        $datos->tipo_retiro = 'bams';
        $datos->status = 'entregado';
        $datos->save();
        if($datos->save()):

        //Obtener los datos arreglo de los campos    
        $segunda_cedula = $request->input('segunda_cedula');
        $segundo_nombre = $request->input('segundo_nombre');
        $segundo_apellido = $request->input('segundo_apellido');
        $segunda_ubicacion = $request->input('segunda_ubicacion');
        $segundo_cargo = $request->input('segundo_cargo');
        $segundo_acueducto = $request->input('segundo_acueducto');
        $segundo_departamento = $request->input('segundo_departamento');
        $sim = $request->input('sim');
        $marca = $request->input('marca');
        $modelo = $request->input('modelo');
        $imeil = $request->input('imeil');
        $serial = $request->input('serial');
        $nroBien = $request->input('nroBien');
        $antena = $request->input('antena');
        $fecha = $request->input('fecha2');
    
       //dd ($cedula, $primer_nombre, $primer_apellido, $telefono_ubicacion, $ubicacion, $cargo, $acueducto, $departamento, $numero_linea, $numero_sim);

        
        // Loop through the dynamic fields and save them
        for ($i = 1; $i <= count($segunda_cedula)-1; $i++) {
            $camposDinamicos = new PersonaBam();
            $camposDinamicos->segunda_cedula = $segunda_cedula[$i];
            $camposDinamicos->segundo_nombre = $segundo_nombre[$i];
            $camposDinamicos->segundo_apellido = $segundo_apellido[$i];
            $camposDinamicos->segunda_ubicacion = $segunda_ubicacion[$i];
            $camposDinamicos->segundo_cargo = $segundo_cargo[$i];
            $camposDinamicos->segundo_acueducto = $segundo_acueducto[$i];
            $camposDinamicos->segundo_departamento = $segundo_departamento[$i];
            $camposDinamicos->sim = $sim[$i];
            $camposDinamicos->marca = $marca[$i];
            $camposDinamicos->modelo = $modelo[$i];
            $camposDinamicos->imeil = $imeil[$i];
            $camposDinamicos->serial = $serial[$i];
            $camposDinamicos->nroBien = $nroBien[$i];
            $camposDinamicos->antena = $antena[$i];
            $camposDinamicos->fecha = $fecha[$i];
            $camposDinamicos->id_retiro = $datos->id;
            $camposDinamicos->status = 'entregado';
            $camposDinamicos->save();
        }
        return back()->with('success', 'La persona se registró con éxito')->with('typealert', 'primary');
    endif;

    }



    public function edit($id){
    $entrega = PersonaBam::find($id);
    return view('Vistas.Bams.editar', compact('entrega'));
     
    }


    public function update(Request $request, $id){
    $entrega = PersonaBam::findOrFail($id);
    $entrega->segunda_cedula = $request->input('segunda_cedula');
    $entrega->segundo_nombre = $request->input('segundo_nombre');
    $entrega->segundo_apellido = $request->input('segundo_apellido');
    $entrega->fecha = $request->input('fecha2');
    $entrega->segunda_ubicacion = $request->input('segunda_ubicacion');
    $entrega->segundo_cargo = $request->input('segundo_cargo');
    $entrega->segundo_acueducto = $request->input('segundo_acueducto');
    $entrega->segundo_departamento = $request->input('segundo_departamento');
    $entrega->sim = $request->input('sim');
    $entrega->marca = $request->input('marca');
    $entrega->modelo = $request->input('modelo');
    $entrega->imeil = $request->input('imeil');
    $entrega->serial = $request->input('serial');
    $entrega->nroBien = $request->input('nroBien');
    $entrega->antena = $request->input('antena');
    $entrega->fecha = $request->input('fecha');
    $entrega->save();
    
    $id_entrega = $entrega->id;

    return redirect()->route('entregaBams.mostrar', compact('id_entrega'));
    }


    public function eliminar($id){
        $entrega = PersonaBam::findOrFail($id);
       /* $retiro->delete();
        if($retiro->delete())
        return redirect()->back();*/
        $entrega->status = 'inactivo';
        $entrega->save();
        if($entrega->save())
        return redirect()->route('entregaBams.mostrar');
    }

    public function filtrar(Request $request){
        $filtro = $request->filtro;
        $desde = $request->desde;
        $hasta = $request->hasta;   
        $entrega = DB::table('persona_bam as a')
    ->join('retiros as c', 'c.id', '=', 'a.id_retiro')
    ->select('a.id', 'a.segunda_cedula', 'a.segundo_nombre', 'a.segundo_apellido',
     'a.fecha', 'a.segunda_ubicacion', 'a.segundo_cargo', 'a.segundo_acueducto',
      'a.segundo_departamento', 'a.status', 'c.cedula', 'c.primer_nombre', 
      'c.primer_apellido', 'a.sim','a.marca', 'a.modelo', 'a.imeil','a.serial',
      'a.nroBien','a.antena',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                'c.primer_nombre', 'c.primer_apellido')
    ->where(function ($query) use ($filtro) {
        $query->where('a.segunda_cedula', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('a.segundo_nombre', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('a.segundo_apellido', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('a.segundo_departamento', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('a.segundo_cargo', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('a.segundo_acueducto', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('c.cedula', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('c.primer_nombre', 'ILIKE', '%' . $filtro . '%')
            ->orWhere('c.primer_apellido', 'ILIKE', '%' . $filtro . '%');
            
    })
    ->when($desde != null && $hasta != null, function ($query) use ($desde, $hasta) {
        $query->where('a.fecha', '>=', $desde)
            ->where('a.fecha', '<=', $hasta);
    })
    ->get();

        if($entrega->isEmpty() && $filtro==null)
        return back();
        else if($entrega->isEmpty() && $filtro!=null){
        $errorMessage = "No se ha encontrado nada";
        Session::flash('errorMessage', $errorMessage);
        return back();
        }else{
        $fields = ['segunda_cedula', 'segundo_nombre', 'segunda_ubicacion', 'segundo_cargo', 'segundo_acueducto', 'segundo_departamento',
        'sim', 'marca', 'modelo', 'imeil', 'serial', 'nroBien', 'antena', 'fecha'];
        $columnNames = ['Cedula', 'Nombre', 'Dirección de ubicación', 'Cargo', 'Acueducto', 'Departamento', 'Sim', 'Marca',
        'Modelo', 'Imeil', 'Serial', 'Número Bien', 'Antena', 'Fecha'];
        $export = new EntregaLineasExcel($entrega, $fields, $columnNames);
        return Excel::download($export, 'entregaBams.xlsx');
        }
    }

    public function generarExcel(){
        //return Excel::download(new EntregaLineasExcel, 'filename.xlsx');
}


   
    // funcion para imprimir pdf
    public function pdf($id){
        $query = PersonaBam::find($id);
        $oldFormat = $query->created_at;
        $fecha = $oldFormat->format('d-m-Y');
        $dia = substr($fecha,0,2);
        $mes = substr($fecha,3,2); 
        $entrega = db::table('persona_bam as a')
        ->join('retiros as b', 'b.id', '=', 'a.id_retiro')
        ->where('a.id', $id)
        ->select('a.segunda_cedula', 'a.segundo_nombre', 'a.segundo_apellido'
        , 'a.segunda_ubicacion', 'a.segundo_cargo',
         'a.segundo_acueducto', 'a.segundo_departamento', 'a.sim', 'a.marca',
          'a.modelo', 'a.imeil', 'a.serial', 'a.nroBien', 'a.antena', 'a.fecha')->get();
        $pdf = Pdf::loadView('Vistas.Bams.pdf', ['entrega' =>$entrega], compact('dia', 'mes'));

        return $pdf->stream('pdf');
       
    }
}
