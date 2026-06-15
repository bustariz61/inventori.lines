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
    <br>
    <br>
    <!--HEADER-->
    <div style="width: 100%; margin: 0 auto;">

        <img class="img" src="{{ public_path('img/rojo.png') }}" width="100%" alt="100%">


    </div>
    <dd></dd>

    <br>
    <h4 class="text-center"> REPUBLICA BOLIVARIANA DE VENEZUELA
        MINISTERIO DEL PODER POPULAR DE ATENCION DE LAS AGUAS
        C.A. HIDROLOGICA DE LA REGION CAPITAL (HIDROCAPITAL)
        ACTA DE ENTREGA
    </h4>
    <h4 class="text-center"> ACTA DE ENTREGA </h4>

    <br>
@foreach ($entrega as $en)
    
    <p class="text-justify">
        En caracas a los dias <b>{{ $dia }}</b> del mes de <b>{{ $mes }}</b> del año 2023 en la Sede central de Mariperez, (los) ciudadano(s)<b> Ing.Isis Coronel Guevara, Gerente de tecnologia de la Informacion y la Comunicacion, </b>
        portador de la cedula de identidad <b>N°. V. 18.186.337 </b>y quien recibe, <b>{{ $en->segundo_nombre }}</b> <b>{{ $en->segundo_apellido }}</b> del departamento <b>{{ $en->segundo_departamento }}</b> portador de la cedula de identidad <b>N°. V.</b> <b>{{ $en->segunda_cedula }}</b>
        el cual tiene el <b>Cargo</b> de <b>{{ $en->segundo_cargo }}</b> <b>y se encuentra ubicado en </b> <b>{{ $en->segunda_ubicacion }}</b> se deja constar la entrega y asignación de un 
        telefono con las siguientes caresteristicas:
    </p>
    <br>
    <p>
        1.<b>MARCA</b>:{{ $en->marca }}
        <br>
        2.<b>COLOR</b>:{{ $en->color }}
        <br>
        3.<b>SERIAL DEL EQUIṔO</b>:{{ $en->serial }}
        <br>
        4.<b>CARGADOR</b>:{{ $en->cargador }}
        <br>
        5.<b>PROTECTOR DE PANTALLA</b>:{{ $en->protector_pantalla }}
        <br>
        6.<b>FORRO</b>:{{ $en->forro }}
        <br>
        7.<b>ACTIVO</b>:{{ $en->activo }}
        <br>
        8.<b>IMEI I</b>:{{ $en->imei1 }}
        <br>
        9.<b>IMEI II</b>:{{ $en->imei2 }}
        <br>
        10.<b>SIM</b>:{{ $en->numero_sim }}
        <br>
        11.<b>NUMERO</b>:{{ $en->numero_linea }}
        <br>
    </p>
    @endforeach

    <BR>
    <P><b>
            "Quedo en cuenta que la negligencia o impericia en el uso del bien asignado y los daños que se le causaren, generaran las responsabilidades diciplinarias, administrativas,
            paneles y civiles de acuerdo a lo establecido en la Ley Organica de la Contraloria General de la Republica y el Sistema Nacional de control Fiscal,la Ley Contra la Corrupcion y demas leyes que regulen la materia"
        </b>
    </P>
    <br>
    <br>
    <p class="text-center">

        Se firma esta acta en conformidad en original y dos copias
    </p>
    <br>
    <br>
    <p class="text-center">
        <b>
            Entrega:
        </b>

    </p>
    <br>
    <br>
    <br>
    <hr class="linea2">
    </hr>
    <hr class="linea1">
    </hr>
    <div class="footer-D">
        <b></b><br>
        <b>C:I</b>
    </div>
    <div class="footer-I">
        <b> Isis coronel Gevara<br>
            C.I.:18.186.337
        </b>
    </div>
</body>

</html>

<style>
    /*ESTILOS GENERALES*/
    * {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;

    }

    .footer-I {
        text-align: left;
        padding-left: 60px;
    }

    .footer-D {
        text-align: right;
        padding-right: 180px;


    }

    .linea1 {
        border-top: 1px solid rgba(20, 20, 20, 0.5);
        width: 30%;
        margin-left: 70%;
        padding-top: 2px;
        float: right;
    }

    .linea2 {
        border-top: 1px solid rgba(20, 20, 20, 0.5);
        width: 30%;
        margin-left: 2%;
        padding-top: 2px;
        float: left;
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
        margin-top: 400px;
        padding-top: 5px;
    }
</style>