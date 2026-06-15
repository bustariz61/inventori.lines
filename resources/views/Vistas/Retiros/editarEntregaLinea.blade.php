@extends('Layouts.panel')
@section('content')

<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush  ">
        <br>
        <br>
        <br>
        <br>
        <br> <br>
        <br>
        <br>
        <br>
      <thead class="thead-light">
        <a href="{{ route('entregaLineas.mostrarEntregaLineas', $entrega->id_retiro) }}" class="btn btn-primary">Regresar</a>

        <tr>
          <th scope="col" style="color: black">Cedula</th>
          <th scope="col" style="color: black">Nombre</th>
          <th scope="col" style="color: black">Apellido</th>
          <th scope="col" style="color: black">Ubicacion</th>
          <th scope="col" style="color: black">Cargo</th>
          <th scope="col" style="color: black">Acueducto</th>
          <th scope="col" style="color: black">Departamento</th>


        </tr>
      </thead>
      <tbody>
        <form action="{{ route('editarEntregaLinea.update', $entrega->id) }}" method="POST" id="form">
            @csrf
        <tr>
            <td><b><input name="segunda_cedula" id="segunda_cedula" value="{{ $entrega->segunda_cedula }}" class="form-control validate-field" type="text" style="width: 100px; height: 40px; color:black"></b></td>
            <td><b><input name="segundo_nombre" id="segundo_nombre" value="{{ $entrega->segundo_nombre }}" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black"></b></td>
            <td><b><input name="segundo_apellido" id="segundo_apellido" value="{{ $entrega->segundo_apellido }}" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black""></b></td>
            <td><b><input name="segunda_ubicacion" id="segunda_ubicacion" value="{{ $entrega->segunda_ubicacion }}" class="form-control validate-field" type="text" style="width: 300px; height: 40px; color:black"></b></td>
            <td><b><input name="segundo_cargo" id="segundo_cargo" value="{{ $entrega->segundo_cargo }}" class="form-control validate-field" type="text" style="width: 200px; height: 40px; color:black"></b></td>
            <td><b><input name="segundo_acueducto" id="segundo_acueducto" value="{{ $entrega->segundo_acueducto }}" class="form-control validate-field" type="text" style="width: 200px; height: 40px; color:black"></b></td>
            <td><b><input name="segundo_departamento" id="segundo_departamento" value="{{ $entrega->segundo_departamento }}" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black"></b></td>

        </tr>
        <tr>
          <th scope="col" style="color: black">Numero Linea</th>
          <th scope="col" style="color: black">Numero sim</th>
          <th scope="col" style="color: black">Telefonia</th>
          <th scope="col" style="color: black">Fecha</th>
        </tr>
        <td><b><input name="numero_linea" id="numero_linea" value="{{ $entrega->numero_linea }}" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black"></b></td>
        <td><b><input name="numero_sim" id="numero_sim" value="{{ $entrega->numero_sim }}" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black"></b></td>
        <td><b>{{ Form::select('telefonia', $telefonia, $nombreTelefonia, ['class' => 'form-control validate', 'style' => 'color: black;']) }}</b></td>
        <td><b><input name="fecha2" id="fecha" value="{{ $entrega->fecha }}" class="form-control validate-field" type="date" style="width: 120px; height: 40px; color:black"></b></td>
        <tr>

        </tr>
        <button type="button" class="btn btn-primary" onclick="validarInput()">Guardar</button>
        </form>
        
          
          
      </tbody>
    </table>
  </div>

@endsection

<script>

  function validarInput(){
    var errores = 0;
  
    $(".validate-field").each(function(i, input) {
    var fieldId = $(input).attr('id');
    if (fieldId === 'segunda_cedula'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }
    
    if (fieldId === 'segundo_nombre'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'segundo_apellido'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'segundo_telefono'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'segunda_ubicacion'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'segundo_cargo'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'segundo_acueducto'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'segundo_departamento'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'numero_linea'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'numero_sim'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }

    if (fieldId === 'telefonia'){ // Replace 'field1' with the ID of the first field
      if ($(input).val().trim() === ''){
        $(input).addClass('campo_con_errores');
        errores++;
      } else {
        $(input).removeClass('campo_con_errores');
      }
    }
  });
    
    if(errores<1) {
      $("#form").submit();
      
    }else{
      alert("Verifique el tipo de dato y la longitud de los campos en rojo")
  
    }
  }
  
  </script>
  
  <style>
    .campo_con_errores{
        border:1px solid red!important;
      }
  </style>