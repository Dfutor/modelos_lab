<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\AulaRepository;

use Illuminate\Http\Request;


class AulaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/aulas",
     *     summary="Listar aulas",
     *     tags={"Aulas"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de aulas"
     *     )
     * )
     */
    public function index()
    {
        $repository = new AulaRepository();
        $aulas = $repository->index();
        return $aulas;
    }

    /**
     * @OA\Post(
     *     path="/api/aulas",
     *     summary="Crear aula",
     *     tags={"Aulas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "nombre", "id_sede", "codigo", "capacidad", "tipo", "descripcion",},
     *             @OA\Property(property="nombre", type="string", example="Juan"),
     *             @OA\Property(property="id_sede", type="integer", example=1),
     *             @OA\Property(property="codigo", type="integer", example=101),
     *             @OA\Property(property="capacidad", type="integer", example=30),
     *             @OA\Property(property="tipo", type="string", example="aula"),
     *             @OA\Property(property="descripcion", type="string", example="Aula de matemáticas"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Aula creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new AulaRepository();
        $aula = $repository->create($request->all());
        return $aula;
    }
    /**
     * @OA\Put(
     *     path="/api/aulas/{id}",
     *     summary="Actualizar aula",
     *     tags={"Aulas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la aula",
     *         @OA\Schema(type="integer")
     *),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre","id_sede","codigo","capacidad","tipo","descripcion"},
     *             @OA\Property(property="nombre", type="string", example="Juan"),
     *             @OA\Property(property="id_sede", type="integer", example=1),
     *             @OA\Property(property="codigo", type="integer", example=101),
     *             @OA\Property(property="capacidad", type="integer", example=30),
     *             @OA\Property(property="tipo", type="string", example="aula"),
     *             @OA\Property(property="descripcion", type="string", example="Aula de matemáticas"),)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Aula actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Aula no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new AulaRepository();
        $aula = $repository->update($id, $request->all());
        return $aula;
    }

    /**
     * @OA\Delete(
     *     path="/api/aulas/{id}",
     *     summary="Eliminar aula",
     *     tags={"Aulas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la aula",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Aula eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Aula no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new AulaRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}|