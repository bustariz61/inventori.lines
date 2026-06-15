<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('registrarDepartamento.guardarDepartamento') }}" method="POST">
    @csrf
    <div>
        <input type="text" name="nombre" placeholder="nombre" />
    </div>
    <button type="submit">enviar</button>
    
    </form>
</body>
</html>