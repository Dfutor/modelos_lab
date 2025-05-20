<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\PeriodoRepository;

use Illuminate\Http\Request;


class PeriodoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/periodos",
     *     summary="Listar periodos",
     *     tags={"Periodos"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de periodos"
     *     )
     * )
     */
    public function index()
    {
        $repository = new PeriodoRepository();
        $periodos = $repository->index();
        return $periodos;
    }

    /**
     * @OA\Post(
     *     path="/api/periodos",
     *     summary="Crear periodo",
     *     tags={"Periodos"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre","fecha_inicio","fecha_fin"},
     *            @OA\Property(property="nombre", type="string", example="2023-2024"),
     *            @OA\Property(property="fecha_inicio", type="string", format="date", example="2023-01-01"),
     *            @OA\Property(property="fecha_fin", type="string", format="date", example="2023-12-31"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Periodo creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new PeriodoRepository();
        $periodo = $repository->create($request->all());
        return $periodo;
    }
    /**
     * @OA\Put(
     *     path="/api/periodos/{id}",
     *     summary="Actualizar periodo",
     *     tags={"Periodos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la periodo",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre","fecha_inicio","fecha_fin"},
     *            @OA\Property(property="nombre", type="string", example="2023-2024"),
     *            @OA\Property(property="fecha_inicio", type="string", format="date", example="2023-01-01"),
     *            @OA\Property(property="fecha_fin", type="string", format="date", example="2023-12-31"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Periodo actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Periodo no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new PeriodoRepository();
        $periodo = $repository->update($id, $request->all());
        return $periodo;
    }

    /**
     * @OA\Delete(
     *     path="/api/periodos/{id}",
     *     summary="Eliminar periodo",
     *     tags={"Periodos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la periodo",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Periodo eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Periodo no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new PeriodoRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}