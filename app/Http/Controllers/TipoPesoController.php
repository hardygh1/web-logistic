<?php

namespace App\Http\Controllers;

use App\Models\TipoPeso;
use Illuminate\Http\Request;

/**
 * Class TipoPesoController
 * @package App\Http\Controllers
 */
class TipoPesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoPesos = TipoPeso::paginate();

        return view('tipo-peso.index', compact('tipoPesos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoPesos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoPeso = new TipoPeso();
        return view('tipo-peso.create', compact('tipoPeso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoPeso::$rules);

        $tipoPeso = TipoPeso::create($request->all());

        return redirect()->route('tipo-pesos.index')
            ->with('success', 'TipoPeso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoPeso = TipoPeso::find($id);

        return view('tipo-peso.show', compact('tipoPeso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoPeso = TipoPeso::find($id);

        return view('tipo-peso.edit', compact('tipoPeso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoPeso $tipoPeso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPeso $tipoPeso)
    {
        request()->validate(TipoPeso::$rules);

        $tipoPeso->update($request->all());

        return redirect()->route('tipo-pesos.index')
            ->with('success', 'TipoPeso updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoPeso = TipoPeso::find($id)->delete();

        return redirect()->route('tipo-pesos.index')
            ->with('success', 'TipoPeso deleted successfully');
    }
}
