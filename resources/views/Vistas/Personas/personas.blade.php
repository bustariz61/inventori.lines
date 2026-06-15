@extends('Layouts.panel')
@section('content')
 
<thead >
  <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block">Lista de personas</a>
</thead>

<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <br>
        <br>
        <br>
        <br>
        <br> <br>
        <br>
        <br>
        <br>
      <thead class="thead-light">
        <a href="{{ route('crearPersona.crearPersona') }}" class="btn btn-primary">Crear Persona</a>
        <tr>
          <th scope="col">Cedula</th>
          <th scope="col">Cedula</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">telefono</th>
          <th scope="col">telefono ubicacion</th>
          <th scope="col">ubicacion</th>
          <th scope="col">departamento</th>
          <th scope="col">cargo</th>
          <th scope="col">acueducto</th>
          <th scope="col">Opciones</th>

        </tr>
      </thead>
      <tbody>

        @foreach ($persona as $pe) 
        <tr>
            <td><b>{{$pe->id}}</b></td>
            <td><b>{{$pe->cedula}}</b></td>
            <td><b>{{$pe->nombre}}</b></td>
            <td><b>{{$pe->apellido}}</b></td>
            <td><b>{{$pe->telefono}}</b></td>
            <td><b>{{$pe->telefono_ubicacion}}</b></td>
            <td><b>{{$pe->ubicacion}}</b></td>
            <td><b>{{$pe->nombre_departamento}}</b></td>
            <td><b>{{$pe->nombre_cargo}}</b></td>
            <td><b>{{$pe->nombre_acueducto}}</b></td>
            <td>
              <a href="{{ route('editarPersona.edit', ['id' => $pe->id]) }}" class="btn btn-sm btn-primary">Editar</a>
              <a href="" class="btn btn-sm btn-danger">Eliminar</a>
  
            </td>
        </tr>
    @endforeach
        
          
          
      </tbody>
    </table>
  </div>

@endsection