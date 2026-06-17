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
          <th scope="col" style="color: black">Fecha</th>
          <th scope="col" style="color: black">Ubicacion</th>
          <th scope="col" style="color: black">Cargo</th>
          <th scope="col" style="color: black">Acueducto</th>
          <th scope="col" style="color: black">Departamento</th>


        </tr>
      </thead>
      <tbody>
        <form action="{{ route('editarEntregaBam.update', $entrega->id) }}" method="POST" id="form">
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
          <th scope="col" style="color: black">Sim</th>
          <th scope="col" style="color: black">Marca</th>
          <th scope="col" style="color: black">Imeil</th>
          <th scope="col" style="color: black">Serial</th>
          <th scope="col" style="color: black">Número de Bien</th>
          <th scope="col" style="color: black">Antena</th>
          <th scope="col" style="color: black">Fecha</th>
        </tr>
        <td><b><input name="sim[]" id="sim" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
        <td><b><input name="marca" id="marca" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
        <td><b><input name="imeil" id="imeil" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
        <td><b><input name="serial" id="serial" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
        <td><b><input name="nroBien" id="nroBien" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
        <td><b><input name="antena" id="antena" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
        <td><b><input name="fecha" id="fecha" class="form-control validate-field" type="date" style="width: 140px; height: 40px; color:black"></b></td>
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
    
  
      if (fieldId === 'sim'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'marca'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'imeil'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'serial'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'nroBien'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'antena'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'fecha'){ // Replace 'field1' with the ID of the first field
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