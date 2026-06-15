@extends('Layouts.panel')
@section('content')
<form action="{{ route('editarLinea.update', $linea->id) }}" method="POST">
    @csrf
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


    <label for="linea">Numero de linea:</label>
    <input type="text" name="linea" value="{{ $linea->linea }}">
    
    <label for="codigo_pug">Codigo Pug:</label>
    <input type="text" name="codigo_pug" value="{{ $linea->codigo_pug }}">

    <label for="codigo_barra">Codigo de barra:</label>
    <input type="text" name="codigo_barra" value="{{ $linea->codigo_barra }}">

    

<br>
<br>
<br>
<button type="submit">Cambiar</button>
    
</form>

@endsection