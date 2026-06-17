@extends('Layouts.panel')
@section('content')
 <br>
 <br>
<h1 class="text-white" align="center">Detalle Retiro Telefono</h1>


<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <br>
        <br>
        <br>
        <br>  
      <thead class="thead-light">
        <a href="{{ route('registroEntregaBams.registrar') }}" class="btn btn-primary">Registrar Entrega Bams</a>

        <tr>
          <th scope="col">Cedula</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido </th>
          <th scope="col">Ubicacion</th>
          <th scope="col">Cargo</th>
          <th scope="col">Acueducto</th>
          <th scope="col">Departamento</th>
          <th scope="col">sim</th>
          <th scope="col">Marca</th>
          <th scope="col">Imeil</th>
          <th scope="col">Serial</th>
          <th scope="col">nroBien</th>
          <th scope="col">Antena</th>
          <th scope="col">Fecha</th>
          <th scope="col">Estatus</th>
          <th scope="col">Opciones</th>

        </tr>
      </thead>
      <tbody>

        @foreach ($entrega as $en) 
        <tr>
            <td><b>{{$en->segunda_cedula}}</b></td>
            <td><b>{{$en->segundo_nombre}}</b></td>
            <td><b>{{$en->segundo_apellido}}</b></td>
            <td><b>{{$en->segunda_ubicacion}}</b></td>
            <td><b>{{$en->segundo_cargo}}</b></td>
            <td><b>{{$en->segundo_acueducto}}</b></td>
            <td><b>{{$en->segundo_departamento}}</b></td>
            <td><b>{{$en->sim}}</b></td>
            <td><b>{{$en->marca}}</b></td>
            <td><b>{{$en->imeil}}</b></td>
            <td><b>{{$en->serial}}</b></td>
            <td><b>{{$en->nroBien}}</b></td>
            <td><b>{{$en->antena}}</b></td>
            <td><b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $en->fecha)->format('d-m-Y') }}</b></td>
            <td><b>{{$en->status}}</b></td>


            <td>
              <a href="{{ route('entregaBamPdf.pdf', ['id' => $en->id]) }}" class="btn btn-sm btn-primary" title="Pdf"><i class="fas fa-file-pdf"></i></a>
              <a  href="{{ route('editarEntregaBam.edit', ['id' => $en->id]) }}" class="btn btn-sm btn-primary"><i class="far fa-edit" title="Editar"></i></a>
            </td>
        </tr>
    @endforeach
        
          
          
      </tbody>
    </table>
  </div>

@endsection