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

        tr {
            border-top: 1pt solid black;
            border-bottom: 1pt solid black;
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
        <br>
        <center style="color: orange;">Final Details for Order #{{$datos->id}}</center>
        <p><b>Order Placed:</b> <?php echo date("Y-m-d"); ?></p>
        <p><b>Order Total:</b>${{$total_precio}}</p>

    </div>

    <table width="100%">
        <tr>
            <td colspan="2" style="text-align: center;">Shipped On <?php echo date("Y-m-d"); ?></td>
        </tr>
        <tr>
            <td width="65%">
                <b>Items Ordered</b><br>
                @foreach($data as $index=>$datos)
                {{$datos->cantidad}} of: {{$datos->name}} - {{$datos->description}}<br>
                @endforeach
            </td>
            <td width="35%" style="text-align: right;">
                <br>
                @foreach($data as $index=>$datos)
                ${{$datos->precio}}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                Shipping Address:<br>
                {{$datos->nombre}} {{$datos->apellido}}<br>
                2131 NW 79th Ave<br>
                MIAMI, FLORIDA, 33122-1615<br>
                United States<br><br>
                <b>Shipping Speed:</b><br>
                Standard Shipping
            </td>
            <td style="text-align: right;">Item(s) Subtotal: ${{$total_precio}}<br>
                Shipping & Handling: $0.00<br>
                <label style="text-align: right;">-----</label><br>
                Total before tax: ${{$total_precio}}<br>
                Sales tax: $0.00<br>
                <label style="text-align: right;">-----</label><br>
                Total for this Shipment: ${{$total_precio}}<br>
                <label style="text-align: right;">-----</label><br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">Payment Information</td>
        </tr>
        <tr>
            <td>
                Payment Method:<br>
                AMEX | Last digits: 3744 <br>
                <br>
                <b>Billing Address</b><br>
                {{$datos->nombre}} {{$datos->apellido}}<br><br>
                2131 NW 79th Ave<br>
                MIAMI, FLORIDA, 33122-1615<br>
                United States<br>
            </td>
            <td style="text-align: right;">Item(s) Subtotal: ${{$total_precio}}<br>
                Shipping & Handling: $0.00<br>
                <label style="text-align: right;">-----</label><br>
                Total before tax: ${{$total_precio}}<br>
                Estimated tax to be collected: $0.00<br>
                <label style="text-align: right;">-----</label><br>
                Grand Total: ${{$total_precio}}<br>

            </td>
        </tr>
        <tr>
            <td>Credit Card transactions</td>
            <td style="text-align: right;">AMEX ending in 3744: <?php echo date("Y-m-d"); ?>: ${{$total_precio}}</td>
        </tr>
    </table>


    <br>

</body>

</html>