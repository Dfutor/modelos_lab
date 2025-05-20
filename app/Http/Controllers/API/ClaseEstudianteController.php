<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\ClaseEstudianteRepository;

use Illuminate\Http\Request;

class ClaseEstudianteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clases_estudiantes",
     *     summary="Listar clases_estudiantes",
     *     tags={"Clases Estudiantes"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de clases_estudiantes"
     *     )
     * )
     */
    public function index()
    {
        $repository = new ClaseEstudianteRepository();
        $clases_estudiantes = $repository->index();
        return $clases_estudiantes;
    }

    /**
     * @OA\Post(
     *     path="/api/clases_estudiantes",
     *     summary="Crear clase_estudiante",
     *     tags={"Clases Estudiantes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_clase","id_estudiante"},
     *             @OA\Property(property="id_clase", type="integer", example=1),
     *             @OA\Property(property="id_estudiante", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Clase_Estudiante creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new ClaseEstudianteRepository();
        $clase_estudiante = $repository->create($request->all());
        return $clase_estudiante;
    }
    /**
     * @OA\Put(
     *     path="/api/clases_estudiantes/{id}",
     *     summary="Actualizar clase_estudiante",
     *     tags={"Clases Estudiantes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase_estudiante",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_clase","id_estudiante"},
     *             @OA\Property(property="id_clase", type="integer", example=1),
     *             @OA\Property(property="id_estudiante", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Clase_Estudiante actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase_Estudiante no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new ClaseEstudianteRepository();
        $clase_estudiante = $repository->update($id, $request->all());
        return $clase_estudiante;
    }

    /**
     * @OA\Delete(
     *     path="/api/clases_estudiantes/{id}",
     *     summary="Eliminar clase_estudiante",
     *     tags={"Clases Estudiantes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase_estudiante",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Clase_Estudiante eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase_Estudiante no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new ClaseEstudianteRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}