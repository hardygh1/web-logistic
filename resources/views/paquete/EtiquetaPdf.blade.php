<?php
$medidaTicket = 300;

?>
<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 13px;
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

        label {
            font-size: 9px;
            font-weight: bold
        }

        p {
            font-size: 9px;
            padding-left: 25px;

        }


        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            margin: 0 auto;
            font-size: 10px;
            border-collapse: collapse;
            text-align: center;
        }

        table,
        td,
        th {
            border: 1px solid;
        }

        td.precio {
            text-align: right;
            font-size: 9px;
        }

        td.cantidad {
            font-size: 9px;
        }

        td.producto {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
            padding-left: 10px;
            padding-right: 10px;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }

        .dark {
            background: black;
            color: white;
        }

        footer {
            position: fixed;
            bottom: 10px;
            left: 35%;
            font-size: 8px;

        }
    </style>
</head>

<body>
    <?php $p = 0; ?>
    @foreach ($data as $index => $datos)
    <?php $p++; ?>
    <div class="ticket centrado">
        <h1>{{$datos->id}}-SJO</h1>
        <h3 style="text-transform: uppercase;">{{$datos->name}}</h3>

        <br>
        <table>

            <tr class="dark">
                <th>Weigth</th>
                <th>Weigth Volume</th>
                <th>Volume</th>
            </tr>

            <tr>
                <td>{{$datos->peso}} {{$datos->tp_abreviatura}}</td>
                <td>{{$datos->volumen_kilo}} Kg</td>
                <td>{{$datos->pies_cubicos}} cuft</td>
            </tr>
            <tr class="dark">
                <th>Length</th>
                <th>Width</th>
                <th>Heigth</th>
            </tr>

            <tr>
                <td>{{$datos->largo}} {{$datos->tm_abreviatura}}</td>
                <td>{{$datos->ancho}} {{$datos->tm_abreviatura}}</td>
                <td>{{$datos->alto}} {{$datos->tm_abreviatura}}</td>
            </tr>

        </table>

        <br>
        <table>

            <tr class="dark">
                <th>Box</th>
                <th>Value</th>

            </tr>

            <tr>
                <td>{{$index+1}}/<?php echo count($data) ?></td>

                <td>${{$datos->precio}}</td>
            </tr>


        </table>
        <br>

        <h3 style="text-transform: uppercase;">{{$datos->nombre}} {{$datos->apellido}} [EB-SJO-{{$datos->cliente_id}}]</h3>
        <br>

        <div>

            <img src="data:image/png;base64,{{$barra}}" alt="barcode" />
        </div>
        <br>
        <h1 style="text-transform: uppercase;">{{$datos->t_abreviatura}}</h1>
        <h1>COSTA RICA</h1>

    </div>
    <footer>
        <?php echo date("Y-m-d H:i:s"); ?>
    </footer>
    <?php
    if ($p < count($data)) {
    ?>
        <div style="page-break-after:always;"></div>
    <?php
    }
    ?>
    @endforeach

</body>

</html>