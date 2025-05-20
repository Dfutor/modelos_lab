<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\ClaseHorarioRepository;

use Illuminate\Http\Request;

class ClaseHorarioController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clases_horarios",
     *     summary="Listar clases_horarios",
     *     tags={"Clases Horarios"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de clases_horarios"
     *     )
     * )
     */
    public function index()
    {
        $repository = new ClaseHorarioRepository();
        $clases_horarios = $repository->index();
        return $clases_horarios;
    }

    /**
     * @OA\Post(
     *     path="/api/clases_horarios",
     *     summary="Crear clase_horario",
     *     tags={"Clases Horarios"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_clase","id_horario"},
     *              @OA\Property(property="id_clase", type="integer", example=1),
     *              @OA\Property(property="id_horario", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Clase_Horario creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new ClaseHorarioRepository();
        $clase_horario = $repository->create($request->all());
        return $clase_horario;
    }
    /**
     * @OA\Put(
     *     path="/api/clases_horarios/{id}",
     *     summary="Actualizar clase_horario",
     *     tags={"Clases Horarios"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase_horario",
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
     *         description="Clase_Horario actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase_Horario no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new ClaseHorarioRepository();
        $clase_horario = $repository->update($id, $request->all());
        return $clase_horario;
    }

    /**
     * @OA\Delete(
     *     path="/api/clases_horarios/{id}",
     *     summary="Eliminar clase_horario",
     *     tags={"Clases Horarios"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase_horario",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Clase_Horario eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase_Horario no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new ClaseHorarioRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}