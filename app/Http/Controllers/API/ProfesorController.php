<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\ProfesorRepository;

use Illuminate\Http\Request;


class ProfesorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/profesores",
     *     summary="Listar profesores",
     *     tags={"Profesores"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de profesores"
     *     )
     * )
     */
    public function index()
    {
        $repository = new ProfesorRepository();
        $profesores = $repository->index();
        return $profesores;
    }

    /**
     * @OA\Post(
     *     path="/api/profesores",
     *     summary="Crear profesor",
     *     tags={"Profesores"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_persona","enfoque"},
     *           @OA\Property(property="id_persona", type="integer", example=1),
     *           @OA\Property(property="enfoque", type="string", example="Matematica"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Profesor creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new ProfesorRepository();
        $profesor = $repository->create($request->all());
        return $profesor;
    }
    /**
     * @OA\Put(
     *     path="/api/profesores/{id}",
     *     summary="Actualizar profesor",
     *     tags={"Profesores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la profesor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *              required={"id_persona","enfoque"},
     *           @OA\Property(property="id_persona", type="integer", example=1),
     *           @OA\Property(property="enfoque", type="string", example="Matematica"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Profesor actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Profesor no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new ProfesorRepository();
        $profesor = $repository->update($id, $request->all());
        return $profesor;
    }

    /**
     * @OA\Delete(
     *     path="/api/profesores/{id}",
     *     summary="Eliminar profesor",
     *     tags={"Profesores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la profesor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Profesor eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Profesor no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new ProfesorRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}