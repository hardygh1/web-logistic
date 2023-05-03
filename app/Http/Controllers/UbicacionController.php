<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Canton;
use App\Models\Distrito;
use App\Models\Pais;
use App\Models\Provincia;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
{
    $paises = Pais::all();

    return view('cliente.form', compact('paises'));
}

public function obtenerUbicaciones(Request $request)
{
    $provincias = Provincia::where('id_pais', $request->id_pais)->get();
    $cantones = Canton::where('id_provincia', $request->id_provincia)->get();
    $distritos = Distrito::where('id_canton', $request->id_canton)->get();

    return response()->json([
        'provincias' => $provincias,
        'cantones' => $cantones,
        'distritos' => $distritos
    ]);
}

}
