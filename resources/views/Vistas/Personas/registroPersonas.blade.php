@extends('Layouts.panel')
@section('content')
<thead >
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" align="center">Registrar personas</a>
  </thead>
    <br>
    <br>
    <br>
    <br>
    <br>  <br>  <br>  <br>  <br> <br>
  <div class="container register-form">
    <div class="form">
        <div class="form-content">
          <div class="row">
            <div class="input-group">
                <div class="input-group-prepend">
                  <div class="col-md-6">
  
                    <form action="{{ route('crearPersona.guardarPersona') }}" method="POST">
                        @csrf
                    <div  class="form-group">
                        <input type="text"  class="form-control" name="cedula" placeholder="Cedula"/>
                    </div>
  
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre"/>
                    </div>
  
                    <div class="form-group">
                        <input type="text" class="form-control"  name="apellido" placeholder="Apellido"/>
                    </div>
  
                    <div class="form-group">
                        <input type="text" class="form-control" name="telefono" placeholder="telefono"/>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" name="telefono_ubicacion" placeholder="telefono de ubicacion"/>
                  </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="ubicacion" placeholder="Ubicacion"/>
                    </div>

                    <small align="center">Departamento</small>
                    {{ Form::select('departamento', $departamento, null, ['class' => 'form-control']) }}
  
                    <br>
                    <small>Cargo</small>
                    {{ Form::select('cargo', $cargo, null, ['class' => 'form-control']) }}
  
                 </div>
                
                    <div class="col-md-6">

                        <small>Acueducto</small>
                        {{ Form::select ('acueducto', $acueducto, null, ['class' => 'form-control']) }}
                    
                  </div>

                </div>
              </div>
              <div class="col-md-3" align="center">
           <button type="submit" class="btn btn-primary">Guardar Registros</button>
       </div>
      </div>
    </div>
  </div>
      </form>
   @endsection