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
  
                    <form action="{{ route('registrarLinea.guardarLinea') }}" method="POST">
                        @csrf
                    <div  class="form-group">
                        <input type="text"  class="form-control" name="linea" placeholder="Número de linea"/>
                    </div>
  
                    <div class="form-group">
                        <input type="text" class="form-control" name="codigo_pug" placeholder="Codigo Pug"/>
                    </div>
  
                    <div class="form-group">
                        <input type="text" class="form-control"  name="codigo_barra" placeholder="Código de barra"/>
                    </div>

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