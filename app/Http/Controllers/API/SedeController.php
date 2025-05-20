<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\SedeRepository;

use Illuminate\Http\Request;


class SedeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/sedes",
     *     summary="Listar sedes",
     *     tags={"Sedes"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de sedes"
     *     )
     * )
     */
    public function index()
    {
        $repository = new SedeRepository();
        $sedes = $repository->index();
        return $sedes;
    }

    /**
     * @OA\Post(
     *     path="/api/sedes",
     *     summary="Crear sede",
     *     tags={"Sedes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre"},
     *           @OA\Property(property="nombre", type="string", example="Sede Central"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Sede creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new SedeRepository();
        $sede = $repository->create($request->all());
        return $sede;
    }
    /*
     * @OA\Put(
     *     path="/api/sedes/{id}",
     *     summary="Actualizar sede",
     *     tags={"Sedes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la sede",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *              required={"nombre"},
     *           @OA\Property(property="nombre", type="string", example="Sede Central"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sede actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sede no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new SedeRepository();
        $sede = $repository->update($id, $request->all());
        return $sede;
    }

    /**
     * @OA\Delete(
     *     path="/api/sedes/{id}",
     *     summary="Eliminar sede",
     *     tags={"Sedes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la sede",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Sede eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sede no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new SedeRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}