<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\DireccionRepository;

use Illuminate\Http\Request;


class DireccionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/direcciones",
     *     summary="Listar direcciones",
     *     tags={"Direcciones"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de direcciones"
     *     )
     * )
     */
    public function index()
    {
        $repository = new DireccionRepository();
        $direcciones = $repository->index();
        return $direcciones;
    }

    /**
     * @OA\Post(
     *     path="/api/direcciones",
     *     summary="Crear direccion",
     *     tags={"Direcciones"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "calle", "numero", "id_ciudad",},
     *             @OA\Property(property="calle", type="string", example="Calle 1"),
     *             @OA\Property(property="numero", type="integer", example=101),
     *             @OA\Property(property="id_ciudad", type="integer", example=1),
     *             
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Direccion creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new DireccionRepository();
        $direccion = $repository->create($request->all());
        return $direccion;
    }
    /**
     * @OA\Put(
     *     path="/api/direcciones/{id}",
     *     summary="Actualizar direccion",
     *     tags={"Direcciones"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la direccion",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "calle", "numero", "id_ciudad",},
     *             @OA\Property(property="calle", type="string", example="Calle 1"),
     *             @OA\Property(property="numero", type="integer", example=101),
     *             @OA\Property(property="id_ciudad", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Direccion actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Direccion no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new DireccionRepository();
        $direccion = $repository->update($id, $request->all());
        return $direccion;
    }

    /**
     * @OA\Delete(
     *     path="/api/direcciones/{id}",
     *     summary="Eliminar direccion",
     *     tags={"Direcciones"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la direccion",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Direccion eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Direccion no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new DireccionRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}