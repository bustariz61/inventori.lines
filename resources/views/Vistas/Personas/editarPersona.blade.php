@extends('Layouts.panel')
@section('content')
<form action="{{ route('editarPersona.update', $persona->id) }}" method="POST">
    @csrf
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


    <label for="cedula">Cedula:</label>
    <input type="text" name="cedula" value="{{ $persona->cedula }}">
    
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $persona->nombre }}">

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="{{ $persona->apellido }}">

    <label for="telefono">Telefono:</label>
    <input type="text" name="telefono" value="{{ $persona->telefono }}">

    <label for="telefono">Telefono de Ubicacion:</label>
    <input type="text" name="telefono_ubicacion" value="{{ $persona->telefono_ubicacion }}">


    <label for="ubicacion">Ubicacion:</label>
    <input type="text" name="ubicacion" value="{{ $persona->ubicacion }}">
<br>
    <label for="departamento">Departamento:</label>
    {{ Form::select('departamento', $departamento, null, ['class' => 'form-control']) }}

    <label for="cargo">Cargo:</label>
    {{ Form::select('cargo', $cargo, null, ['class' => 'form-control']) }}


    <label for="acueducto">Acueducto:</label>
    {{ Form::select('acueducto', $acueducto, null, ['class' => 'form-control']) }}
    

<br>
<br>
<br>
<button type="submit">Cambiar</button>
    
</form>

@endsection