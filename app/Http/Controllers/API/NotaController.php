<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\NotaRepository;

use Illuminate\Http\Request;


class NotaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/notas",
     *     summary="Listar notas",
     *     tags={"Notas"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de notas"
     *     )
     * )
     */
    public function index()
    {
        $repository = new NotaRepository();
        $notas = $repository->index();
        return $notas;
    }

    /**
     * @OA\Post(
     *     path="/api/notas",
     *     summary="Crear nota",
     *     tags={"Notas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_estudiante","id_clase","id_periodo","valor","fecha"},
     *               @OA\Property(property="id_estudiante", type="integer", example=1),
     *               @OA\Property(property="id_clase", type="integer", example=1),
     *               @OA\Property(property="id_periodo", type="integer", example=1),
     *               @OA\Property(property="valor", type="integer", example=10),
     *               @OA\Property(property="fecha", type="string", format="date", example="2023-10-01"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Nota creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new NotaRepository();
        $nota = $repository->create($request->all());
        return $nota;
    }
    /**
     * @OA\Put(
     *     path="/api/notas/{id}",
     *     summary="Actualizar nota",
     *     tags={"Notas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la nota",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_estudiante","id_clase","id_periodo","valor","fecha"},
     *               @OA\Property(property="id_estudiante", type="integer", example=1),
     *               @OA\Property(property="id_clase", type="integer", example=1),
     *               @OA\Property(property="id_periodo", type="integer", example=1),
     *               @OA\Property(property="valor", type="integer", example=10),
     *               @OA\Property(property="fecha", type="string", format="date", example="2023-10-01"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Nota actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Nota no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new NotaRepository();
        $nota = $repository->update($id, $request->all());
        return $nota;
    }

    /**
     * @OA\Delete(
     *     path="/api/notas/{id}",
     *     summary="Eliminar nota",
     *     tags={"Notas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la nota",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Nota eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Nota no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new NotaRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}