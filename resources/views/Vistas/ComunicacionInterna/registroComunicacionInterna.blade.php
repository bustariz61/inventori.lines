@extends('Layouts.panel')
@section('content')

<h1 class="text-white" align="center">Comunicación Interna</h1>

<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush  ">
        <br>
        <br>
        <br>
        <br>
        <br> 
        <br>
        <br>  
      <thead class="thead-light">
        <a href="{{ route('comunicacionInterna.mostrarComunicacionInterna') }}" class="btn btn-primary">Regresar</a>
      <button type="button" class="btn btn-primary" onclick="validarInput()">Guardar</button>


        <tr>
          <th scope="col" style="color: black">Para</th>
          <th scope="col" style="color: black">De</th>
          <th scope="col" style="color: black">CC</th>
          <th scope="col" style="color: black">Asunto</th>
        </tr>
      </thead>
      <tbody>
        <form action={{ route('registrarComunicacionInterna.guardarComunicacionInterna') }} method="POST" id="form">
          @csrf
        <tr>
            <td><b><input name="para" id="para" class="form-control original" type="text" style="width: 150px; color:black;"></b></td>
            <td><b><input name="de" id="de" class="form-control original" type="text" style="width: 150px; color:black;"></b></td>
            <td><b><input name="cc" id="cc" class="form-control original" type="text" style="width: 150px; color:black;"></b></td>
            <td><b><input name="asunto" id="asunto" class="form-control original" type="text" style="width: 500px; color:black;"></b></td>
        </tr>
          <input type="file" id="fileInput" name="xd">
          <textarea id="textInput"></textarea>

        

        
          
          
      </tbody>
    </table>
  </div> 

  <div id="table-container">
    <table class="table table-bordered ocultar" id="tabla">
      <thead>
          <tr>
              <th colspan="1">N°</th>
              <th colspan="2">DESCRIPCIÓN DE INSUMO</th>
              <th colspan="3">CANTIDAD</th>
              <th colspan="4">OBSERVACIONES</th>
  <button type="button" class="btn btn-primary" onclick="mostrar()">Mostrar </button>

          </tr>
      </thead>
      <tbody id="xd">
          <tr id="clonar">
              <td colspan="1"><b><input type="text" name="numero[]" class="form-control"></b></td>
              <td colspan="2"><b><input type="text" name="descripcion[]" class="form-control"></b></td>
              <td colspan="3"><b><input type="text" name="cantidad[]" class="form-control"></b></td>
              <td colspan="4"><b><input type="text" name="observaciones[]" class="form-control"></b></td> 
              <button type="button" class="btn btn-primary" onclick="addDynamicField()">Agregar Registro</button>
              <button type="button" class="btn btn-danger remove-row" onclick="removeDynamicField(this)">Remove</button>

          </tr>
          

      </tbody>      
  </table>
</div> 
</form>


@endsection

<script>
const fileInput = document.getElementById('fileInput');
const textInput = document.getElementById('textInput');

fileInput.addEventListener('change', (event) => {
  const selectedFile = event.target.files[0];
  const fileReader = new FileReader();

  fileReader.onload = (e) => {
    const fileContent = e.target.result;
    textInput.value = fileContent;
  };

  fileReader.readAsText(selectedFile);
});
</script>


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

function mostrar(){
  $("#tabla").show();
}

  
function addDynamicField() {
  var dynamicFieldsDiv = document.getElementById('xd');
  var templateField = document.getElementById('clonar');

  var clone = templateField.cloneNode(true);
  clone.style.display = 'table-row'; // Set the display style to 'table-row'

  var removeButton = document.createElement('button');
  removeButton.type = 'button';
  removeButton.className = 'btn btn-danger remove-row';
  removeButton.innerText = 'Remove';
  removeButton.onclick = function() {
    removeDynamicField(this);
  };

  clone.appendChild(removeButton);

  dynamicFieldsDiv.appendChild(clone);
}

 
  
</script>

  
  <style>
    .campo_con_errores{
        border:1px solid red!important;
      }
    .mostrar{
      display: table;
    }
    .ocultar{
      display: none;
    }
  </style>