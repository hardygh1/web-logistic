<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\Paquete;
use App\Models\Proveedore;
use App\Models\Transporte;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


/**
 * Class PaqueteController
 * @package App\Http\Controllers
 */
class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heads = [

            ['label' => '#', 'width' => 2],
            ['label' => 'Código', 'width' => 10],
            ['label' => 'Cliente', 'width' => 30],
            ['label' => 'Transporte', 'width' => 15],
            ['label' => 'Proveedor', 'width' => 15],
            ['label' => 'Acción', 'no-export' => true, 'width' => 25],
        ];

        $paquetes = Paquete::paginate();
        $clientes = Cliente::all();
        $proveedores = Proveedore::all();

        
        $transportes = DB::table('transportes')->where('status', 1)->get();


        return view('paquete.index', compact('heads', 'paquetes', 'clientes', 'proveedores', 'transportes'))
            ->with('i', (request()->input('page', 1) - 1) * $paquetes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paquete = new Paquete();
        $clientes = Cliente::all();
        $proveedores = Proveedore::all();
        return view('paquete.create', compact('paquete', 'clientes', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = 'success';
        $text = 'Se guardó exitosamente';
        $paquete = Paquete::create($request->all());
        // if ($paquete->status) {
        //     $message = 'success';
        //     $text = 'Se guardó exitosamente';
        // } else {
        //     $message = 'danger';
        //     $text = 'No se pudo guardar. Revise su conexión';
        // }
        return redirect()->route('paquetes.index')
            ->with($message, $text);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paquete = Paquete::find($id);

        //return view('paquete.show', compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paquete = Paquete::find($id);
        $clientes = Cliente::all();
        $proveedores = Proveedore::all();

        $transportes = DB::table('transportes')->where('status', 1)->get();

        $heads = [

            ['label' => '#', 'width' => 2],
            ['label' => 'Tracking', 'width' => 8],
            ['label' => 'Categoría', 'width' => 8],
            ['label' => 'Descripción', 'width' => 15],
            ['label' => 'Peso', 'width' => 5],
            ['label' => 'Largo x Ancho x Alto', 'width' => 30],
            ['label' => 'Volumen Kilo', 'width' => 20],
            ['label' => 'Peso Cúb.', 'width' => 20],
            ['label' => 'Acción', 'no-export' => true, 'width' => 20],
        ];

        $articulos =  DB::select('
            SELECT 
                a.*,
                c.name,
                tp.abreviatura,
                tm.abreviatura

            FROM
                articulos as a

            INNER JOIN
                categorias as c ON c.id = a.id_codigo_categoria
            INNER JOIN
                tipo_peso as tp ON tp.id = a.id_tipo_peso
            INNER JOIN
                tipo_medida as tm ON tm.id = a.id_tipo_medida

            WHERE
                a.status = 1 and a.id_codigo_paquete = '.$id.'
            ');
        
        $categorias = DB::table('categorias')->where('status', 1)->get();
        $tipo_peso =  DB::table('tipo_peso')->where('status', 1)->get();
        $tipo_medida = DB::table('tipo_medida')->where('status', 1)->get();

        return view('paquete.edit', compact('paquete', 'clientes', 'proveedores', 'transportes', 'heads', 'articulos', 'categorias', 'tipo_peso', 'tipo_medida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paquete $paquete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paquete $paquete)
    {
        request()->validate(Paquete::$rules);

        $paquete->update($request->all());

        return redirect()->route('paquetes.index')
            ->with('success', 'Paquete actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paquete = Paquete::find($id)->delete();

        return redirect()->route('paquetes.index')
            ->with('success', 'Paquete deleted successfully');
    }

    public function generar(Request $request){
        return redirect()->route('paquetes.index')
            ->with('success', 'Paquete deleted successfully');
    }
}
