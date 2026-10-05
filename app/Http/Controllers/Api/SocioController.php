<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocioRequest;
use App\Http\Requests\UpdateSocioRequest;
use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SocioController extends Controller
{

    public function index(): JsonResponse
    {
        $socios = Socio::query()
            ->orderBy('apellidos')
            ->orderBy('nombres')
            ->get();

        return response()->json($socios);
    }

    public function store(StoreSocioRequest $request): JsonResponse
    {
        $socio = Socio::create($request->validated());

        return response()->json(
            $socio,
            201
        );
    }

    public function show(Socio $socio): JsonResponse
    {
        return response()->json($socio);
    }

    public function buscarPorCedula(Request $request): JsonResponse
    {
        $cedula = $request->query('cedula');

        $socio = Socio::query()
            ->where('tipo_documento', 'CI')
            ->where('numero_documento', $cedula)
            ->firstOrFail();

        return response()->json($socio);
    }

    public function update(UpdateSocioRequest $request, Socio $socio): JsonResponse
    {
        $socio->update($request->validated());

        return response()->json($socio->refresh());
    }
}
