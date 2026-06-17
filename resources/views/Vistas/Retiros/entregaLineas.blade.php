@extends('Layouts.panel')
@section('content')
 
<thead >
  <br>
  <br>
<h1 class="text-white" align="center">Lineas Asignadas</h1>
</thead>

<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <br>
        <br>
        <br>
        <br>

      <thead class="thead-light">
        <a href="{{ route('registroEntregaLinea.registrarEntregaLinea') }}" class="btn btn-primary">Registrar Entrega de Linea</a>
        <form action="{{ route('filtrar.filtrar') }}" method="GET" id="form">
          @if(Session::has('errorMessage'))
          <div id="flash-message" class="alert alert-danger">
              {{ Session::get('errorMessage') }}
          </div>
          @endif
          <label for="min_age">Filtro:</label>
          <input type="text" name="filtro" id="filtro ">
          <label for="min_age">Fecha:</label>
          <input type="date" name="desde" id="desde">
          <input type="date" name="hasta" id="hasta">
      
          <button type="submit" class="btn">Aplicar filtro</button>
        </form>

        <a href="{{ route('entregaLineasExcel.generarExcel') }}" class="btn btn-primary"><i class="fa-light fa-file-excel"></i></a>


        <br>
        <br>

        <tr>
          <th scope="col">Nombre Gerente</th>
          <th scope="col">Cedula</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Acueducto</th>
          <th scope="col">Departamento</th>
          <th scope="col">Cargo</th>
          <th scope="col">Numero Linea</th>
          <th scope="col">Numero Sim</th>
          <th scope="col">Telefonia</th>
          <th scope="col">Fecha Entrega</th>
          <th scope="col">Status</th>
          <th scope="col">Opciones</th>

        </tr>
      </thead>
      <tbody>

        @foreach ($entrega as $en) 
        <tr>
            <td><b>{{$en->primer_nombre}} {{ $en->primer_apellido }}</b></td>
            <td><b>{{$en->segunda_cedula}}</b></td>
            <td><b>{{$en->segundo_nombre}}</b></td>
            <td><b>{{$en->segundo_apellido}}</b></td>
            <td><b>{{$en->segundo_acueducto}}</b></td>
            <td><b>{{$en->segundo_departamento}}</b></td>
            <td><b>{{$en->segundo_cargo}}</b></td>
            <td><b>{{$en->numero_linea}}</b></td>
            <td><b>{{$en->numero_sim}}</b></td>
            <td><b>{{$en->telefonia}}</b></td>
            <td><b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $en->fecha)->format('d-m-Y') }}</b></td>
            <td><b>{{$en->status}}</b></td> 


            <td>
              <a href="{{ route('entregaLineaPdf.mostrarPdf', ['id' => $en->id]) }}" class="btn btn-sm btn-primary" title="Pdf"><i class="fas fa-file-pdf"></i></a>
              <a  href="{{ route('editarEntregaLinea.edit', ['id' => $en->id]) }}" class="btn btn-sm btn-primary"><i class="far fa-edit" title="Editar"></i></a>
              <a href="{{ route('eliminarEntregaLinea.eliminarEntregaLinea', ['id' => $en->id]) }}" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash"></i></a>


              
            </td>
        </tr>
    @endforeach
        
          
          
      </tbody>
    </table>
  </div>

@endsection
<script>

  // Wait for the document to be fully loaded
  document.addEventListener('DOMContentLoaded', function() {
      // Get the flash message element
      var flashMessage = document.getElementById('flash-message');
      
      // If the element exists
      if (flashMessage) {
          // Set a timeout function to hide the element after 2 seconds
          setTimeout(function() {
              flashMessage.style.display = 'none';
          }, 1000); // 2000 milliseconds = 2 seconds
      }
  });
</script>

