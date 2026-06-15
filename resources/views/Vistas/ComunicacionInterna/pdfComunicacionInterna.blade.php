<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>COMUNICACION INTERNA</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <!--HEADER-->
    <div style="width: 100%; margin: 0 auto;">

        <img class="img" src="{{ public_path('img/rojo.png') }}" width="100%" alt="100%">


    </div>
    <dd></dd>

    <br>
    <h4 class="text-center">COMUNICACION INTERNA</h4><br><br>

    <table class="table table-bordered">
        <thead>


        </thead>
        <tbody>
            <tr>
                <th Width=15%>PARA:</th>
                <td Width=85%>{{ $comunicacion->para }}</td>
            </tr>

            <tr>
                <th>DE:</th>
                <td>{{ $comunicacion->de }}</td>
            </tr>
            <tr>
                <th>CC:</th>
                <td>{{ $comunicacion->cc }}</td>
            </tr>
            <tr>
                <th>ASUNTO:</th>
                <td>{{ $comunicacion->asunto }}</td>
            </tr>

            <tr>
                <th>FECHA:</th>
                <td>{{ $fecha }}</td>
            </tr>


        </tbody>
    </table>
    <br>
    <br>
    <p class="text-justify">
        Antes todo reciban un cordial saludo Bolivariano, Revolucionario, Socialista, Antiimperialista y profundamente Chavista, en el marco de la consolidación del plan de la
    patria, diseñado por el comandante Supremo de la Revolución Hugo Chávez.</p>
    <br>
    </p>
    <p>
        {{ $comunicacion->texto }}
    </p>
    <!--FIRMA-->
    <div class="firma">
        <p class="text-center">

            Atentamente
        </p>
        <p class="text-center">
            Isis Coronel Gerente de Tecnología de la
            Información y Comunicación
            Sede Central Maripérez.
        </p>

    </div>
<br>
<br>
<br>
<br>
    <img class="img" src="{{ public_path('img/banner.png') }}" width="100%" height="100px" alt="error">

</body>

</html>

<style>
    /*ESTILOS GENERALES*/
    * {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;

    }

    .table {
        width: 42%;
        height: 5px;
        background-color: rgba(243, 243, 243, 0.521);
        width: 100%;
        margin: 5px;
        padding: 5px;
        border-radius: 5px;
        border-color: blue;

    }

    .firma {
        margin-top: 300px;
        padding-top: 5px;
    }
</style>