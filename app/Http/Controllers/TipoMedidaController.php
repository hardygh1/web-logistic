<?php

namespace App\Http\Controllers;

use App\Models\TipoMedida;
use Illuminate\Http\Request;

/**
 * Class TipoMedidaController
 * @package App\Http\Controllers
 */
class TipoMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoMedidas = TipoMedida::paginate();

        return view('tipo-medida.index', compact('tipoMedidas'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoMedidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoMedida = new TipoMedida();
        return view('tipo-medida.create', compact('tipoMedida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoMedida::$rules);

        $tipoMedida = TipoMedida::create($request->all());

        return redirect()->route('tipo-medidas.index')
            ->with('success', 'TipoMedida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoMedida = TipoMedida::find($id);

        return view('tipo-medida.show', compact('tipoMedida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoMedida = TipoMedida::find($id);

        return view('tipo-medida.edit', compact('tipoMedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoMedida $tipoMedida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMedida $tipoMedida)
    {
        request()->validate(TipoMedida::$rules);

        $tipoMedida->update($request->all());

        return redirect()->route('tipo-medidas.index')
            ->with('success', 'TipoMedida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoMedida = TipoMedida::find($id)->delete();

        return redirect()->route('tipo-medidas.index')
            ->with('success', 'TipoMedida deleted successfully');
    }
}
