<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use App\Models\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    // Vista HTML con filtro por provincia
    public function index(Request $request)
    {
        $provincias = Provincia::orderBy('nombre')->get();

        $rutas = Ruta::with(['provincia', 'categoria'])
            ->when($request->filled('provincia_id'), function ($consulta) use ($request) {
                $consulta->where('provincia_id', (int) $request->input('provincia_id'));
            })
            ->orderBy('nombre')
            ->get();

        return view('rutas.index', compact('rutas', 'provincias'));
    }

    // API REST simple: devuelve JSON
    public function api()
    {
        $rutas = Ruta::with(['provincia:id,nombre', 'categoria:id,nombre'])
            ->orderBy('nombre')
            ->get(['id', 'nombre', 'dificultad', 'distancia_km', 'provincia_id', 'categoria_id']);

        return response()->json([
            'status' => 'success',
            'total'  => $rutas->count(),
            'data'   => $rutas,
        ]);
    }
}
