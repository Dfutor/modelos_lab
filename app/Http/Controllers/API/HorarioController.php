<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\HorarioRepository;

use Illuminate\Http\Request;


class HorarioController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/horarios",
     *     summary="Listar horarios",
     *     tags={"Grados"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de horarios"
     *     )
     * )
     */
    public function index()
    {
        $repository = new HorarioRepository();
        $horarios = $repository->index();
        return $horarios;
    }

    /**
     * @OA\Post(
     *     path="/api/horarios",
     *     summary="Crear horario",
     *     tags={"Grados"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "dia","hora_inicio","hora_fin"},
     *           @OA\Property(property="dia", type="string", example="Lunes"),
     *           @OA\Property(property="hora_inicio", type="string", example="08:00"),
     *           @OA\Property(property="hora_fin", type="string", example="10:00"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Horario creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new HorarioRepository();
        $horario = $repository->create($request->all());
        return $horario;
    }
    /**
     * @OA\Put(
     *     path="/api/horarios/{id}",
     *     summary="Actualizar horario",
     *     tags={"Grados"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la horario",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "dia","hora_inicio","hora_fin"},
     *           @OA\Property(property="dia", type="string", example="Lunes"),
     *           @OA\Property(property="hora_inicio", type="string", example="08:00"),
     *           @OA\Property(property="hora_fin", type="string", example="10:00"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Horario actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Horario no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new HorarioRepository();
        $horario = $repository->update($id, $request->all());
        return $horario;
    }

    /**
     * @OA\Delete(
     *     path="/api/horarios/{id}",
     *     summary="Eliminar horario",
     *     tags={"Grados"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la horario",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Horario eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Horario no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new HorarioRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}