<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\ClaseProfesorRepository;

use Illuminate\Http\Request;

class ClaseProfesorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clases_profesores",
     *     summary="Listar clases_profesores",
     *     tags={"Clases Profesores"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de clases_profesores"
     *     )
     * )
     */
    public function index()
    {
        $repository = new ClaseProfesorRepository();
        $clases_profesores = $repository->index();
        return $clases_profesores;
    }

    /**
     * @OA\Post(
     *     path="/api/clases_profesores",
     *     summary="Crear clase_profesor",
     *     tags={"Clases Profesores"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_clase","id_profesor"},
     *             @OA\Property(property="id_clase", type="integer", example=1),
     *             @OA\Property(property="id_profesor", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Clase_Profesor creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new ClaseProfesorRepository();
        $clase_profesor = $repository->create($request->all());
        return $clase_profesor;
    }
    /**
     * @OA\Put(
     *     path="/api/clases_profesores/{id}",
     *     summary="Actualizar clase_profesor",
     *     tags={"Clases Profesores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase_profesor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_clase","id_profesor"},
     *             @OA\Property(property="id_clase", type="integer", example=1),
     *             @OA\Property(property="id_profesor", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Clase_Profesor actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase_Profesor no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new ClaseProfesorRepository();
        $clase_profesor = $repository->update($id, $request->all());
        return $clase_profesor;
    }

    /**
     * @OA\Delete(
     *     path="/api/clases_profesores/{id}",
     *     summary="Eliminar clase_profesor",
     *     tags={"Clases Profesores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase_profesor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Clase_Profesor eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase_Profesor no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new ClaseProfesorRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}