@extends('Layouts.panel')
@section('content')
 <br>
 <br>
<h1 class="text-white" align="center">Comunicacion Interna</h1>


<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <br>
        <br>
        <br> <br>
        <br>
      <thead class="thead-light">
        <a href="{{ route('registrarComunicacionInterna.registrarComunicacionInterna') }}" class="btn btn-primary">Registrar Comunicacion Interna</a>

        <tr>
          <th scope="col">Para</th>
          <th scope="col">De</th>
          <th scope="col">CC</th>
          <th scope="col">Asunto</th>
          <th scope="col">Opciones</th>

        </tr>
      </thead>
      <tbody>
          @foreach($comunicacion as $co)
        <tr>
            <td><b>{{ $co->para }}</b></td>
            <td><b>{{ $co->de }}</b></td>
            <td><b>{{ $co->cc }}</b></td>
            <td><b>{{ $co->asunto }}</b></td>

            <td>
            <a href="{{ route('editarComunicacionInterna.edit', ['id' => $co->id]) }}" class="btn btn-sm btn-primary">Editar</a>
            <a href="{{ route('pdf.mostrarPdf', ['id' => $co->id]) }}" class="btn btn-sm btn-primary">Pdf</a>
            <a href="{{ route('eliminarComunicacionInterna.eliminarComunicacion', ['id' => $co->id]) }}" class="btn btn-sm btn-danger">Eliminar</a>


              
            </td>
        </tr>

          @endforeach
      </tbody>
    </table>
  </div>

@endsection