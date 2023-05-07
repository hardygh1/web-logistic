<?php

namespace App\Http\Controllers;

use App\Models\Transporte;
use Illuminate\Http\Request;

/**
 * Class TransporteController
 * @package App\Http\Controllers
 */
class TransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportes = Transporte::paginate();

        return view('transporte.index', compact('transportes'))
            ->with('i', (request()->input('page', 1) - 1) * $transportes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transporte = new Transporte();
        return view('transporte.create', compact('transporte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Transporte::$rules);

        $transporte = Transporte::create($request->all());

        return redirect()->route('transportes.index')
            ->with('success', 'Transporte created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transporte = Transporte::find($id);

        return view('transporte.show', compact('transporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transporte = Transporte::find($id);

        return view('transporte.edit', compact('transporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Transporte $transporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transporte $transporte)
    {
        request()->validate(Transporte::$rules);

        $transporte->update($request->all());

        return redirect()->route('transportes.index')
            ->with('success', 'Transporte updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transporte = Transporte::find($id)->delete();

        return redirect()->route('transportes.index')
            ->with('success', 'Transporte deleted successfully');
    }
}
