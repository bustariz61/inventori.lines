@extends('Layouts.panel')
@section('content')
 
<thead >
  <br>
  <br>
<h1 class="text-white" align="center">Lineas Asignadas</h1>
</thead>

<a href="{{ route('registroEntregaLinea.registrarEntregaLinea') }}" class="btn btn-primary">Registrar Entrega Lineas</a>
<br><br>

<form action="{{ route('filtrarEntregaLineas.filtrar') }}" method="GET" id="form">
  @if(Session::has('errorMessage'))
  <div id="flash-message" class="alert alert-danger">
      {{ Session::get('errorMessage') }}
  </div>
  @endif
  <!--<label for="min_age">Filtro:</label>-->
  <div class="input-group sm-2">
    <div class="input-group-prepend">
      <!--<span class="input-group-text" id="basic-addon1">@</span>-->
    </div>
    <input type="text" name="filtro" class="form-control" placeholder="Escriba CI, Nombre, Apellido, Cargo, Departamento, Acueducto etc.." id="filtro "><br><br>
  </div><br><br>
 
  
  <!--<input type="text" name="filtro" id="filtro ">-->
  
  <div class="container">
   
      <div class='col-sm-6'>
         <div class="form-group">
  <div class='input-group date' id='datetimepicker1'>
    <label for="desde">Desde:</label>&nbsp;&nbsp;
  <input type="date" name="desde" id="desde">
  <label for="hasta">Desde:</label>&nbsp;&nbsp;
  <input type="date" name="hasta" id="hasta">
   
  <button type="submit" class="btn">Aplicar filtro</button>
  
  </div>
  
</div>
</div>
</div>
</div>


  


  <!--<button type="submit" class="btn">Aplicar filtro</button>-->
</form>

<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <br>
        <br>
        <br>
        <br>

      <thead class="thead-light">
        <tr>
          <th scope="col" align="center">Nombre Gerente</th>
          <th scope="col" align="center">Cedula</th>
          <th scope="col" align="center">Nombre</th>
          <th scope="col" align="center">Apellido</th>
          <th scope="col" align="center">Acueducto</th>
          <th scope="col" align="center">Departamento</th>
          <th scope="col" align="center">Cargo</th>
          <th scope="col" align="center">Numero Linea</th>
          <th scope="col" align="center">Numero Sim</th>
          <th scope="col" align="center">Telefonia</th>
          <th scope="col" align="center">Fecha Entrega</th>
          <th scope="col" align="center">Status</th>
          <th scope="col" align="center">Opciones</th>

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

