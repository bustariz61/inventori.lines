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
        <a href="{{ route('registrarLinea.registrarLinea') }}" class="btn btn-primary">Registrar Linea</a>
        <tr>
          <th scope="col">Numero de linea</th>
          <th scope="col">Codigo pug</th>
          <th scope="col">Codigo de barra</th>

        </tr>
      </thead>
      <tbody>

        @foreach ($linea as $li) 
        <tr>
            <td><b>{{$li->linea}}</b></td>
            <td><b>{{$li->codigo_pug}}</b></td>
            <td><b>{{$li->codigo_barra}}</b></td>
            <td>
              <a href="{{ route('editarLinea.edit', ['id' => $li->id]) }}" class="btn btn-sm btn-primary">Editar</a>
              <a href="" class="btn btn-sm btn-danger">Eliminar</a>
  
            </td>
        </tr>
    @endforeach
        
          
          
      </tbody>
    </table>
  </div>

@endsection