@extends('Layouts.form')
@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          
          <form role="form" action="{{ route('dashboard.recibirDatosLogin') }}" method="POST" id="form">
            @csrf
            @if(Session::has('errorMessage'))
    <div id="flash-message" class="alert alert-danger">
        {{ Session::get('errorMessage') }}
    </div>
@endif

            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Usuario" name="usuario" type="user"value="{{ old('usuario') }}" required autocomplete="usuario" autofocus>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Contraseña" type="password" name="contraseña" required autocomplete="current-password">
              </div>
            </div>
            <div class="custom-control custom-control-alternative custom-checkbox">
              <input class="custom-control-input" name="remember" id="remember" type="checkbox">
              <label class="custom-control-label" for="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="text-muted">Recordarme</span>
              </label>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="{{ route('password.contraseñaOlvidada') }}" class="text-light"><small>¿Olvidó su contraseña?</small></a>
        </div>
        <div class="col-6 text-right">
          <a href="{{ route('register.vistaRegistro') }}" class="text-light"><small>Crear nueva cuenta</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="py-5">
  <div class="container">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
          © 2023 <a class="font-weight-bold ml-1" target="_blank">Creative</a>
        </div>
      </div>
      
    </div>
  </div>
</footer>
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
