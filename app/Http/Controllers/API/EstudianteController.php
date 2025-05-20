<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\EstudianteRepository;

use Illuminate\Http\Request;


class EstudianteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/estudiantes",
     *     summary="Listar estudiantes",
     *     tags={"Estudiantes"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de estudiantes"
     *     )
     * )
     */
    public function index()
    {
        $repository = new EstudianteRepository();
        $estudiantes = $repository->index();
        return $estudiantes;
    }

    /**
     * @OA\Post(
     *     path="/api/estudiantes",
     *     summary="Crear estudiante",
     *     tags={"Estudiantes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "id_persona"},
     *             @OA\Property(property="id_persona", type="integer", example=1),
     *             
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Estudiante creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new EstudianteRepository();
        $estudiante = $repository->create($request->all());
        return $estudiante;
    }
    /**
     * @OA\Put(
     *     path="/api/estudiantes/{id}",
     *     summary="Actualizar estudiante",
     *     tags={"Estudiantes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la estudiante",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "id_persona"},
     *             @OA\Property(property="id_persona", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Estudiante actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Estudiante no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new EstudianteRepository();
        $estudiante = $repository->update($id, $request->all());
        return $estudiante;
    }

    /**
     * @OA\Delete(
     *     path="/api/estudiantes/{id}",
     *     summary="Eliminar estudiante",
     *     tags={"Estudiantes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la estudiante",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Estudiante eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Estudiante no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new EstudianteRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}