<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use \Milon\Barcode\DNS1D;

class ReportesController extends Controller
{
   public function index()
   {
   }
   public function store()
   {
   }
   public function show($id)
   {
      $datos = explode(",", $id);
      if (count($datos) > 0) {
         $data =  DB::select('
                           SELECT
                              c.name
                              ,a.peso
                              ,a.largo
                              ,a.ancho
                              ,a.alto
                              ,a.volumen_kilo
                              ,a.pies_cubicos
                              ,a.id_tipo_medida
                              ,a.cantidad
                              ,a.description
                              ,a.precio
                              ,t.abreviatura as t_abreviatura
                              ,p.id
                              ,tp.abreviatura as tp_abreviatura
                              ,tm.abreviatura as tm_abreviatura
                              ,cl.id as cliente_id
                              ,cl.identificacion
                              ,cl.nombre
                              ,cl.apellido
                              ,cl.direccion_1
                              ,UPPER(pr.nombre) AS proveedor
                              ,p.created_at as fecha
                              
                           FROM articulos as a
                              INNER JOIN categorias as c ON c.id = a.id_codigo_categoria
                              INNER JOIN tipo_peso as tp ON tp.id = a.id_tipo_peso
                              INNER JOIN tipo_medida as tm ON tm.id = a.id_tipo_medida
                              INNER JOIN paquetes as p ON p.id = a.id_codigo_paquete
                              INNER JOIN transportes as t ON t.id = p.id_tipo_transporte
                              INNER JOIN clientes as cl ON cl.id = p.id_codigo_cliente
                              INNER JOIN proveedores as pr ON pr.id = p.id_proveedor
                              
                              WHERE p.id = ' . $datos[0] . '
               
               ');
         switch ($datos[1]) {
            case '1':
               $d = new DNS1D();
               $d->setStorPath(__DIR__ . '/cache/');
               $barra = $d->getBarcodePNG($datos[0], 'C39');
               $pdf = \PDF::loadView('paquete.EtiquetaPdf', compact(['data', 'barra']))->setPaper('b7');
               return $pdf->download("Etiqueta-" . $datos[0] . ".pdf");
               break;
            case '2':
               $pdf = \PDF::loadView('paquete.ReciboPdf', compact(['data']))->setPaper('A4');
               return $pdf->download("Recibo-" . $datos[0] . ".pdf");
               break;
            case '3':
               $proveedor = count($data) > 0 ? $data[0]->proveedor : '';
               $fecha = count($data) > 0 ? $data[0]->fecha : '';
               $pdf = \PDF::loadView('paquete.FacturaPdf', compact(['data','proveedor','fecha']))->setPaper('A4');
               return $pdf->download("Factura-" . $datos[0] . ".pdf");
               break;
         }
      }
   }
}
