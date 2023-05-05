<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate();

        $heads = [
            'Identificación',
            'Codigo',
            'Nombre',
            'Apellido',
            'Correo',
            'Acciones'
        ];

        return view('cliente.index', compact('clientes','heads'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();

        $response = Http::get('https://ubicaciones.paginasweb.cr/provincias.json');
        $provincias = $response->json();

        $provincia_id = request('provincias', old('provincia_id'));

        $responseprovincia = Http::get("https://ubicaciones.paginasweb.cr/provincia/1/cantones.json");
            $cantones = $responseprovincia->json();


        if ($provincia_id) {
            $response = Http::get("https://ubicaciones.paginasweb.cr/provincia/1/cantones.json");
            $cantones = $response->json();

        } else {
            $cantones = [];
        }

        return view('cliente.create', compact('cliente','provincias','cantones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        request()->validate(Cliente::$rules);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente deleted successfully');
    }
}
