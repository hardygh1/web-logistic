<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
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
            ['label' => 'Nombre', 'width' => 20],
            ['label' => 'Descripción', 'width' => 50],
            ['label' => 'Estado', 'width' => 5],
            ['label' => 'Acción', 'no-export' => true, 'width' => 25],
        ];

        $categorias = Categoria::paginate();
        $categoria = new Categoria();

        return view('categoria.index', compact('heads', 'categorias', 'categoria'))
            ->with('i', (request()->input('page', 1) - 1) * $categorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $messages = [
        //     'name.required' => 'El atributo nombre se requiere.',
        //     'description.required' => 'El atributo descripción se requiere.',
        // ];

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => 'El atributo nombre se requiere.',
                'description.required' => 'El atributo descripción se requiere.',
            ]
        );
        if ($validator->fails()) {
            $message = 'warning';
            $text = 'Debe de ingresar todos los campos requeridos';
        } else {
            $categoria = Categoria::create($request->all());
            if ($categoria->status) {
                $message = 'success';
                $text = 'Se guardó exitosamente';
            } else {
                $message = 'danger';
                $text = 'No se pudo guardar. Revise su conexión';
            }
        }
        return redirect()->route('categorias.index')
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
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        request()->validate(Categoria::$rules);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id)->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria deleted successfully');
    }
}
