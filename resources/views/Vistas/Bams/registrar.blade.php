@extends('Layouts.panel')
@section('content')
<br>
<br>
<h1 class="text-white" align="center">Entrega Bams</h1>
<div class="table-responsive">
  <div id="container">

    <form action="{{ route('registroEntregaBams.guardar') }}" method="POST" id="form">
      @csrf
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush  ">
            <br>
            <br>
            <br>
          <thead class="thead-light">
      
      <br>
      <h2>Datos del gerente</h2>
      <a href="{{ route('dashboard.mostrarDashboard') }}" class="btn btn-primary">Regresar</a>
      <br>
        
        
        
                <div class="row">
                  <div class="col-3">
                    <input  class="form-control original"
                            type="text" id="buscadorCedula"
                            placeholder="Cédula">
                  </div>
        
                  <div class="col-3">
                    <input  class="form-control original"
                            type="text" id="buscadorNombre"
                            placeholder="Nombre">
                  </div>
        
                  <div class="col-3">
                    <input  class="form-control original"
                            type="text" id="buscadorApellido"
                            placeholder="Apellido"
                    >
                  </div>
                  <div class="col-2">
                    <button type="button" class="btn btn-success" onclick="buscarPersona()"><i class="fas fa-search"></i> Buscar</button>
                  </div>
                </div>
                <br><br>
                <div id="mostrarPersonas"></div>
        
        
        
                  <br><br>
    
        <tr>
          <th scope="colr" style="color: black">Datos Persona</th>
          </tr>      
      
      <tr>
              <th scope="col" style="color: black">Cedula</th>
              <th scope="col" style="color: black">Nombre</th>
              <th scope="col" style="color: black">Apellido</th>
              <th scope="col" style="color: black">Direccion</th>
              <th scope="col" style="color: black">Cargo</th>
              <th scope="col" style="color: black">Acueducto</th>
              <th scope="col" style="color: black">Departamento</th>
              <th scope="col" style="color: black">Fecha</th>
    
    
            </tr>
          </thead>
          <tbody>
            <tr>
                <td><b><input name="cedula" id="cedula" class="form-control original" type="text" style="width: 120px; height: 40px; color:black"></b></td>
                <td><b><input name="primer_nombre" id="primer_nombre" class="form-control original" type="text" style="width: 120px; height: 40px; color:black"></b></td>
                <td><b><input name="primer_apellido" id="primer_apellido" class="form-control original" type="text" style="width: 120px; height: 40px; color:black"></b></td>
                <td><b><input name="ubicacion" id="ubicacion" class="form-control original" type="text" style="width: 250px; height: 40px; color:black"></b></td>
                <td><b><input name="cargo" id="cargo" class="form-control original" type="text" style="width: 140px; height: 40px; color:black"></b></td>
                <td><b><input name="acueducto" id="acueducto" class="form-control original" type="text" style="width:140px; height: 40px; color:black"></b></td>
                <td><b><input name="departamento" id="departamento" class="form-control original" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                <td><b><input name="fecha" id="telefono_ubicacion" class="form-control original" type="date" style="width: 140px; height: 40px; color:black"></b></td>
            </tr>
            
              
              
          </tbody>
        </table>
      </div>
    
<br>
      <h2>Asignado a</h2>
      <button type="button" class="btn btn-primary" onclick="addDynamicField()">Asignar Bam</button>

      <div id="dynamic-fields">
        <!-- Template field for cloning -->
        <div id="template-field" style="display: none">
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush  ">
              <thead class="thead-light">
          
          <br>          
                <tr>
                  <th scope="col" style="color: black">Cedula</th>
                  <th scope="col" style="color: black">Nombre</th>
                  <th scope="col" style="color: black">Apellido</th>
                  <th scope="col" style="color: black">Direccion</th>
                  <th scope="col" style="color: black">Cargo</th>
                  <th scope="col" style="color: black">Acueducto</th>
                  <th scope="col" style="color: black">Departamento</th>
                  
        
        
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td><b><input name="segunda_cedula[]" id="segunda_cedula" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black"></b></td>
                    <td><b><input name="segundo_nombre[]" id="segundo_nombre" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black"></b></td>
                    <td><b><input name="segundo_apellido[]" id="segundo_apellido" class="form-control validate-field" type="text" style="width: 120px; height: 40px; color:black"></b></td>
                    <td><b><input name="segunda_ubicacion[]" id="segunda_ubicacion" class="form-control validate-field" type="text" style="width: 250px; height: 40px; color:black"></b></td>
                    <td><b><input name="segundo_cargo[]" id="segundo_cargo" class="form-control validate-field" type="text" style="width: 140px; height: 40px; color:black"></b></td>
                    <td><b><input name="segundo_acueducto[]" id="segundo_acueducto" class="form-control validate-field" type="text" style="width: 140px; height: 40px; color:black"></b></td>
                    <td><b><input name="segundo_departamento[]" id="segundo_departamento" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    
    
                </tr>
                <tr>
                  <th scope="col" style="color: black">Sim</th>
                  <th scope="col" style="color: black">Marca</th>
                  <th scope="col" style="color: black">Modelo</th>
                  <th scope="col" style="color: black">Imeil</th>
                  <th scope="col" style="color: black">Serial</th>
                  <th scope="col" style="color: black">Numero de Bien</th>
                  <th scope="col" style="color: black">Antena</th>
                  <th scope="col" style="color: black">Fecha</th>
                </tr>
                <tr>
                    <td><b><input name="sim[]" id="sim" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    <td><b><input name="marca[]" id="marca" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    <td><b><input name="modelo[]" id="modelo" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    <td><b><input name="imeil[]" id="imeil" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    <td><b><input name="serial[]" id="serial" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    <td><b><input name="nroBien[]" id="nroBien" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    <td><b><input name="antena[]" id="antena" class="form-control validate-field" type="text" style="width: 150px; height: 40px; color:black"></b></td>
                    <td><b><input name="fecha2[]" id="fecha2" class="form-control validate-field" type="date" style="width: 140px; height: 40px; color:black"></b></td>
                </tr>

                  
                  
              </tbody>
            </table>
          </div>
            <button type="button" onclick="removeDynamicField(this)" class="btn btn-primary">Eliminar</button>

            <br>
            <br>
        </div>
    </div>
    <br>
    <button type="button" class="btn btn-primary" onclick="validarInput()">Guardar</button>

  </form>
  </div>
</div>

<script>
  $('#error-message').fadeIn('slow');

// Set a timeout to hide the error message after 2 seconds
setTimeout(function() {
  $('#error-message').fadeOut('slow');
}, 2000);
</script>





@endsection
<script>
function buscarPersona(){

var cedula = $('#buscadorCedula').val()
var nombre = $('#buscadorNombre').val()
var apellido = $('#buscadorApellido').val()
$.ajax({
  url : '/buscarPersona',
  method : 'post',
  data :{
    "_token":"{{csrf_token()}}",
    filtroCedula : cedula,
    filtroNombre : nombre,
    filtroApellido : apellido,
  },
  success : function(persona){
    console.log(persona)
    var html = "<div class='row'><table class='table table-striped'><tr> <th>Cedula</th> <th>Nombres</th>  <th>Apellidos </th><th>Acueducto</th> <th>Gerencia</th> <th>Cargo</th> <th>Agregar</th> </tr>"
    for(i=0; i< persona.length; i++){
      html+= "<tr class='fila2'><td id='cedper[i]'>"+persona[i]['cedper']
            +"</td><td id='nomper'>"+persona[i]['nomper']
            +"</td><td id='apeper'>"+persona[i]['apeper']
            +"</td><td id='desuibfis'>"+persona[i]['desubifis']
            +"</td><td id='desuniadm'>"+persona[i]['desuniadm']
            +"</td><td id='denasicar'>"+persona[i]['denasicar']
            +"</td><td> <a class='btn btn-success' onclick='agregarPersona("+persona[i]['cedper']
            +")' ><i class='fas fa-user-plus'></i></i></a></td></tr>"
    }
    html+= "</table>"
    $("#mostrarPersonas").css('display','')
    $("#mostrarPersonas").html(html)
  }
})
}

function agregarPersona(ced){
$.ajax({
  url : '/buscarPersona',
  method : 'post',
  data :{
    "_token":"{{csrf_token()}}",
    filtroCedula : ced,
    filtroNombre : '',
    filtroApellido : '',
  }, success : function(persona){
    $("#cedula").val(persona[0]['cedper']).attr('readonly','true')
    $("#primer_nombre").val(persona[0]['nomper']).attr('readonly','true')
    $("#primer_apellido").val(persona[0]['apeper']).attr('readonly','true')
    $("#acueducto").val(persona[0]['desubifis']).attr('readonly','true')
    $("#departamento").val(persona[0]['desuniadm']).attr('readonly','true')
    $("#cargo").val(persona[0]['denasicar']).attr('readonly','true')

    $("#mostrarPersonas").css('display','none')
  }
})

}


function addDynamicField() {
    var dynamicFieldsDiv = document.getElementById('dynamic-fields');
    var templateField = document.getElementById('template-field');

    var clone = templateField.cloneNode(true);
    clone.style.display = 'block';

    dynamicFieldsDiv.appendChild(clone);
}

function removeDynamicField(button) {
    var dynamicField = button.parentNode;
    var dynamicFieldsDiv = dynamicField.parentNode;
    
    if (dynamicFieldsDiv.children.length > 1) {
        dynamicFieldsDiv.removeChild(dynamicField);
    }
}
</script>

<script>

  function validarInput() {
    var errores2 = 0;
    var errores = 0;
  
    $(".validate-field").each(function(i, input) {
      var fieldId = $(input).attr('id');
      i2= i
      if(i>14){
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

      if (fieldId === 'modelo'){ // Replace 'field1' with the ID of the first field
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

      if (fieldId === 'fecha2'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
      
  
      }
  
    });
  
    $(".original").each(function(j, input) {
      var fieldId = $(input).attr('id');
      if (fieldId === 'cedula'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'primer_nombre'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'primer_apellido'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'telefono_ubicacion'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'ubicacion'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'cargo'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'acueducto'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
  
      if (fieldId === 'departamento'){ // Replace 'field1' with the ID of the first field
        if ($(input).val().trim() === ''){
          $(input).addClass('campo_con_errores');
          errores2++;
        } else {
          $(input).removeClass('campo_con_errores');
        }
      }
    });
    
    if(errores<1 && i2>14 && errores2<1) {
      $("#form").submit();
      
    } else if(i2<=14 && errores2<1){
      alert("Agregue una relacion para guardar")
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