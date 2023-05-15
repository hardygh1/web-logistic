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
            border-collapse: collapse;
        }

        .tabletr {
            border-top: 1pt solid black;
            border-bottom: 1pt solid black;
            border-left: 1pt solid black;
            border-right: 1pt solid black;
        }

        tr {
            border-left: 1pt solid black;
            border-right: 1pt solid black;
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

    <div style="text-align: left; line-height: 3pt;">
        <br>
        @if($proveedor=='AMAZON')
        <img style="display: block;position:relative;margin:20px auto" src="https://1000marcas.net/wp-content/uploads/2019/11/Amazon-logo.png" alt="" width="110" />
        @else
        <br>
        @endif
        
        <center style="color: orange;">Final Details for Order #{{$cabecera->id}}</center>
        <p><b>Order Placed:</b> {{$fecha}}</p>
        <p><b>Order Total:</b>${{$total_precio}}</p>

    </div>

    <table width="100%">
        <tr class="tabletr">
            <td colspan="2" style="text-align: center;">Shipped On {{$fecha}}</td>
        </tr>
        <tr class="tabletr">
            <td width="60%">
                <b>Items Ordered</b><br>
                @foreach($data as $index=>$datos)
                {{$datos->cantidad}} of: {{$datos->name}} - {{$datos->description}}<br>
                @endforeach
            </td>
            <td width="40%" style="text-align: right;">
                <br>
                @foreach($data as $index=>$datos)
                ${{$datos->precio}}<br>
                @endforeach
            </td>
        </tr>
        <tr class="tabletr">
            <td>
                Shipping Address:<br>
                {{$cabecera->nombre}} {{$cabecera->apellido}}<br>
                2131 NW 79th Ave<br>
                MIAMI, FLORIDA, 33122-1615<br>
                United States<br><br>
                <b>Shipping Speed:</b><br>
                Standard Shipping
            </td>
            <td style="text-align: right;">
                Item(s) Subtotal: ${{$total_precio}}<br>
                Shipping & Handling: $0.00<br>
                <label style="text-align: right;">-----</label><br>
                Total before tax: ${{$total_precio}}<br>
                Sales tax: $0.00<br>
                <label style="text-align: right;">-----</label><br>
                Total for this Shipment: ${{$total_precio}}<br>
                <label style="text-align: right;">-----</label><br>
            </td>
        </tr>
        <tr class="tabletr">
            <td colspan="2" style="text-align: center;">Payment Information</td>
        </tr>
        <tr>
            <td>Payment Method:
            </td>
            <td style="text-align: right;">
                Item(s) Subtotal: ${{$total_precio}}</td>
        </tr>
        <tr>
            <td>
                AMEX | Last digits: 3744</td>
            <td style="text-align: right;"> Shipping & Handling: $0.00</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: right;"> <label style="text-align: right;">-----</label></td>
        </tr>
        <tr>
            <td>
                <b>Billing Address</b>
            </td>
            <td style="text-align: right;"> Total before tax: ${{$total_precio}}</td>
        </tr>
        <tr>
            <td>{{$cabecera->nombre}} {{$cabecera->apellido}}</td>
            <td style="text-align: right;"> Estimated tax to be collected: $0.00</td>
        </tr>
        <tr>
            <td>2131 NW 79th Ave</td>
            <td style="text-align: right;"> <label style="text-align: right;">-----</label></td>
        </tr>
        <tr>
            <td>MIAMI, FLORIDA, 33122-1615</td>
            <td style="text-align: right;"> <label style="text-align: right;">-----</label></td>
        </tr>
        <tr>
            <td>United States</td>
            <td style="text-align: right;"> Grand Total: ${{$total_precio}}</td>
        </tr>
        <tr class="tabletr">
            <td>Credit Card transactions</td>
            <td style="text-align: right;">AMEX ending in 3744: {{$fecha}}: ${{$total_precio}}</td>
        </tr>
    </table>
    <div style="text-align: center;font-size: xx-small; color:cornflowerblue">
        To view the status of your order, return to Order Summary<br>
        Conditions of Use | Privacy Notice
        @if($proveedor=='AMAZON')
        ©1996-<?php echo date("Y"); ?>, Amazon.com, Inc. or its afliates
        @endif
    </div>

    <br>

</body>

</html>