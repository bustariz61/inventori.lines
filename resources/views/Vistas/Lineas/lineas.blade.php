@extends('Vistas.dashboard')
@section('title','Listado de Lineas')
@section('mainPage')

<div class="table-responsive mt-4">
  <div class="row mb-3">
    {{-- <div class="col-3">
      <label for="">
        <h3>Listado de Lineas</h3>
      </label>
    </div> --}}
    <div class="offset-10">
      <a href="{{ route('registrarLinea.registrarLinea') }}" class="btn btn-primary">Registrar Linea</a>
    </div>
  </div>
    <!-- Projects table -->
    <table class="table">

      <thead class="thead-light">
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