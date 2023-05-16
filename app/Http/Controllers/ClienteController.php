<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
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

        return view('cliente.index', compact('clientes', 'heads'))
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


        $response = file_get_contents('https://ubicaciones.paginasweb.cr/provincias.json');
        $provincias = json_decode($response);
        $data = [];
        foreach ($provincias as $index => $prov) {
            $data[$index] = array("id"=>$index,"cod_postal" => $index * 10000, "nombre" => $prov);
            //array_push($data,$index);
            // $data[$index] = $prov
            // $data[$index] = [];
            //$data[$index]->id = $index;
        }
        // foreach ($provincias as $index => $prov) {
        //     //$data[$index]=$index;

        //     array_push($data, [ "id" => $index, "cod_postal" => $index * 10000, "nombre" => $prov] );
        //     //array_push($array, array("id" => $index, "cod_postal" => $index * 10000, "nombre" => $prov));
        // }
        //$data=array($data);
        $provincias =  json_decode(json_encode($data, JSON_FORCE_OBJECT));
        //$provincias = request('provincias', old('provincia_id'));

        // $responseprovincia = file_get_contents("https://ubicaciones.paginasweb.cr/provincia/1/cantones.json");
        // $cantones = json_decode($responseprovincia);


        // if ($provincia_id) {
        //     $response = file_get_contents("https://ubicaciones.paginasweb.cr/provincia/1/cantones.json");
        //     $cantones = json_decode($response);

        // } else {
        $cantones = [];
        // }

        return view('cliente.create', compact('cliente', 'provincias', 'cantones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $identificacion = $request->input('identificacion');

        // Verificar si ya existe un cliente con la misma identificación
        $existeCliente = Cliente::where('identificacion', $identificacion)->exists();

        if ($existeCliente) {
            // Mostrar error o realizar alguna acción adecuada
            return redirect()->back()->withErrors(['identificacion' => 'La identificación ya está en uso']);
        }

        $request->validate([
            'identificacion' => 'required',
            // ... otras reglas de validación para los demás campos ...
        ]);

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
        $response = file_get_contents('https://ubicaciones.paginasweb.cr/provincias.json');
        $provincias = json_decode($response);
        $data = [];
        foreach ($provincias as $index => $prov) {
            $data[$index] = array("id"=>$index,"cod_postal" => $index * 10000, "nombre" => $prov);
            //array_push($data,$index);
            // $data[$index] = $prov
            // $data[$index] = [];
            //$data[$index]->id = $index;
        }
        // foreach ($provincias as $index => $prov) {
        //     //$data[$index]=$index;

        //     array_push($data, [ "id" => $index, "cod_postal" => $index * 10000, "nombre" => $prov] );
        //     //array_push($array, array("id" => $index, "cod_postal" => $index * 10000, "nombre" => $prov));
        // }
        //$data=array($data);
        $provincias =  json_decode(json_encode($data, JSON_FORCE_OBJECT));
        $cantones = [];
        return view('cliente.edit', compact('cliente','provincias','cantones'));
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


    public function validarIdentificacion(Request $request)
    {
        $validatedData = $request->validate([
            'identificacion' => [
                'required',
                Rule::unique('clientes')->ignore($request->cliente_id),
            ],
        ]);

        return response()->json(['valid' => true]);
    }
}
