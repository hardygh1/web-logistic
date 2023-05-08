<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 11px;
            font-family: 'DejaVu Sans', serif;

        }

        h1 {
            font-size: 16px;
        }

        h2 {
            font-size: 14px;
        }

        h3 {
            font-size: 13px;

        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    $total_piezas = count($data);
    $total_pesos = 0;
    $total_pv = 0;
    $total_volumen = 0;
    $total_precio = 0;

    foreach ($data as $index => $datos) {
        $total_pesos = $total_pesos + $datos->peso;
        $total_pv =  $total_pv  + $datos->volumen_kilo;
        $total_volumen = $total_volumen + $datos->pies_cubicos;
        $total_precio = $total_precio + $datos->precio;
    }
    ?>

    <div style="text-align: right; line-height: 3pt;">
        <p>AMERICARGO EPXRESS INC</p>
        <p>2131 NW 79th Avenue</p>
        <p>Miami, FL, 33122, USA</p>
        <p>USA: +1 305-436-1408</p>
        <p>https://www.americargoexpress.com/</p>
        <p>Recibo {{$datos->id}} </p>
        <p><?php echo date("Y-m-d"); ?></p>
        <br>
    </div>
    <div style="border: 1px black solid;">
        <table style="text-transform: uppercase;">
            <tr>
                <td>Embarcador:</td>
                <td>Consignatario:</td>
            </tr>
            <tr>
                <td>SHIPPING DEPARTMENT (1373) </td>
                <td>{{$datos->nombre}} {{$datos->apellido}} [EB-SJO-{{$datos->cliente_id}}]</td>
            </tr>
            <tr>
                <td>1800 WORDEIDE</td>
                <td>N-A</td>
            </tr>
            <tr>
                <td>MIAMI, FL, USA </td>
                <td>SAN JOSE, CR</td>
            </tr>
            <tr>
                <td></td>
                <td>PHONE: N/A</td>
            </tr>
        </table>
    </div>
    <div>
        <table>
            <tr>
                <td style="text-align: left;">Agente: EASY BOX (277)</td>
                <td style="text-align: right;">Destination City: SAN JOSE</td>
            </tr>
            <tr>
                <td style="text-align: left;">Transporte: UPS </td>
                <td style="text-align: right;">Destination Country: COSTA RICA</td>
            </tr>
            <tr>
                <td style="text-align: left;"></td>
                <td style="text-align: right;">Valor Declarado: $ <?php echo $total_precio; ?></td>
            </tr>

        </table>
    </div>
    <br>
    <div>


        <table style="border-collapse: collapse; text-align: center;">
            <tr style="border: 1px black solid;">
                <td>Piezas</td>
                <td>Total Peso</td>
                <td>Total Peso/Volúmen</td>
                <td>Total Volúmen</td>
            </tr>

            <tr>
                <td><?php echo $total_piezas; ?></td>
                <td><?php echo $total_pesos; ?> {{$datos->tp_abreviatura}}</td>
                <td><?php echo $total_pv; ?> {{$datos->tp_abreviatura}} Kg</td>
                <td><?php echo $total_volumen; ?> {{$datos->tp_abreviatura}} cuft</td>
            </tr>
        </table>

        <br>
        <br>
        <table style="border-collapse: collapse; text-align: center;">
            <tr style="border: 1px black solid;">
                <td>Largo</td>
                <td>Ancho</td>
                <td>Alto</td>
                <td>Units</td>
                <td>Package</td>
                <td>Peso</td>
                <td>Descripción del Contenido</td>
            </tr>
            @foreach($data as $index=>$datos)
            <tr>
                <td>{{$datos->largo}} {{$datos->tm_abreviatura}}</td>
                <td>{{$datos->ancho}} {{$datos->tm_abreviatura}}</td>
                <td>{{$datos->alto}} {{$datos->tm_abreviatura}}</td>
                <td>{{$datos->cantidad}}</td>
                <td>Package</td>
                <td>{{$datos->peso}}</td>
                <td>{{$datos->name}}</td>
            </tr>
            @endforeach
        </table>
    </div>




</body>

</html>