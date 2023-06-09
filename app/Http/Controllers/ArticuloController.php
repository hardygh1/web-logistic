<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Transporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ArticuloController
 * @package App\Http\Controllers
 */
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate();

        return view('articulo.index', compact('articulos'))
            ->with('i', (request()->input('page', 1) - 1) * $articulos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = new Articulo();
        return view('articulo.create', compact('articulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'id_codigo_paquete' => 'required',
                'id_codigo_categoria' => 'required',
                'peso' => 'required',
                'id_tipo_peso' => 'required',
                'largo' => 'required',
                'ancho' => 'required',
                'alto' => 'required',
                'id_tipo_medida' => 'required',
                'status' => 'required',
                'description' => 'required',
                'tracking' => 'required'
            ],
            [
                'id_codigo_paquete.required' => 'El id Paquete se requiere.',
                'id_codigo_categoria.required' => 'El id Categoría se requiere.',
                'peso.required' => 'El peso se requiere.',
                'id_tipo_peso.required' => 'El id Tipo Peso se requiere.',
                'largo.required' => 'El atributo largo se requiere.',
                'ancho.required' => 'El atributo ancho se requiere.',
                'alto.required' => 'El atributo alto se requiere.',
                'id_tipo_medida.required' => 'El id Tipo Medida  se requiere.',
                'status.required' => 'El atributo status se requiere.',
                'description.required' => 'El atributo descripción se requiere.',
                'tracking.required' => 'El atributo descripción se requiere.',
            ]
        );
        if ($validator->fails()) {
            $message = 'warning';
            $text = 'Debe de ingresar todos los campos requeridos';
        } else {
            // if($request->id_tipo_peso==1){
            //     $request['peso'] = $request['peso']/2.205;
            //     $request['id_tipo_peso'] = 2;
            // }
            $v = 1;
            $p = 1;
            switch ($request->id_tipo_medida) {
                case 1: //pulgadas
                    $v = 366;
                    $p = 1728;
                    break;
                case 2: // centìmetros
                    $v = 6000;
                    $p = 28320;
                    break;
            }
            //HALLAMOS VOLUMEN KILO => kg
            $request['volumen_kilo'] = (($request->largo * $request->ancho * $request->alto)) / $v;

            //HALLAMOS PESO VOLUMÉTRICO => cuft
            $request['pies_cubicos'] = (($request->largo * $request->ancho * $request->alto)) / $p;

            if ($request['id'] > 0) {
                //$this->update($request, $request->id);
                $articulo = Articulo::find($request['id'])->fill($request->all())->save();
                //$articulo = Articulo::update($request->all());
                // $message ='success';
                // $text=$articulo;
                if ($articulo=='1') {
                    $message = 'warning';
                    $text = 'Se actualizó exitosamente';
                } else {
                    $message = 'danger';
                    $text = 'No se pudo actualizar. Revise su conexión';
                }
            } else {

                $articulo = Articulo::create($request->all());
                if ($articulo->status) {
                    $message = 'success';
                    $text = 'Se guardó exitosamente';
                } else {
                    $message = 'danger';
                    $text = 'No se pudo guardar. Revise su conexión';
                }
            }
        }

        return redirect()->back()->with($message, $text);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);

        return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::find($id);

        return view('articulo.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        request()->validate(Articulo::$rules);

        $articulo->update($request->all());

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id)->delete();

        return redirect()->back();
    }
}
