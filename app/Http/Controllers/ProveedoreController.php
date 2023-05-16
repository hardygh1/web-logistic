<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
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
            ['label' => 'Nombre', 'width' => 70],
            // ['label' => 'Descripción', 'width' => 50],
            ['label' => 'Estado', 'width' => 5],
            ['label' => 'Acción', 'no-export' => true, 'width' => 25],
        ];

        $proveedores = Proveedore::paginate();
        $proveedore = new Proveedore();

        return view('proveedore.index', compact('proveedores','heads','proveedore'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore'));
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
                'nombre' => 'required',
                // 'description' => 'required',
            ],
            [
                'nombre.required' => 'El atributo nombre se requiere.',
                // 'description.required' => 'El atributo descripción se requiere.',
            ]
        );
        if ($validator->fails()) {
            $message = 'warning';
            $text = 'Debe de ingresar todos los campos requeridos';
        } else {
            $proveedore = Proveedore::create($request->all());
            if ($proveedore->estado) {
                $message = 'success';
                $text = 'Se guardó exitosamente';
            } else {
                $message = 'danger';
                $text = 'No se pudo guardar. Revise su conexión';
            }
        }


        return redirect()->route('proveedores.index')
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
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        request()->validate(Proveedore::$rules);

        $proveedore->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore deleted successfully');
    }
}
