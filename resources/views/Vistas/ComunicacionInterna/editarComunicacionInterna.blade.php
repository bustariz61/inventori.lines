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
        <a href="{{ route('comunicacionInterna.mostrarComunicacionInterna') }}" class="btn btn-primary">Regresar</a>

        <tr>
          <th scope="col" style="color: black">Para</th>
          <th scope="col" style="color: black">De</th>
          <th scope="col" style="color: black">CC</th>
          <th scope="col" style="color: black">Asunto</th>
        </tr>
      </thead>
      <tbody>
        <form action="{{ route('editarComunicacionInterna.update', $comunicacion->id) }}" method="POST" id="form">
            @csrf
        <tr>
            <td><b><input name="para" id="para" value="{{ $comunicacion->para }}" class="form-control original" type="text" style="width: 150px; height: 40px; color:black"></b></td>
            <td><b><input name="de" id="de" value="{{ $comunicacion->de }}" class="form-control original" type="text" style="width: 150px; height: 40px; color:black"></b></td>
            <td><b><input name="cc" id="cc" value="{{ $comunicacion->cc }}" class="form-control original" type="text" style="width: 150px; height: 40px; color:black"></b></td>
            <td><b><input name="asunto" id="asunto" value="{{ $comunicacion->asunto }}" class="form-control original" type="text" style="width: 500px; height: 40px; color:black"></b></td>
        </tr>
        <tr>
          <td colspan="4">
              <br>
              <br>
              <br>
              <br>
              <textarea id="texto" class="original" name="texto"  rows="4" cols="50" style="height:200px; width: 1050px;">
                {{ $comunicacion->texto }}
              </textarea>
          </td>
      </tr>
        <button type="button" class="btn btn-primary" onclick="validarInput()">Guardar</button>
        </form>
        
          
          
      </tbody>
    </table>
  </div>

@endsection

<script>
  function validarInput() {
    var errores = 0;
  
    $(".original").each(function(i, input) {
      var fieldId = $(input).attr('id');
      if (fieldId === 'para'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'de'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'cc'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'asunto'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }

      if (fieldId === 'texto'){ // Replace 'field1' with the ID of the first field
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

