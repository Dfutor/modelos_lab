<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\PaisRepository;

use Illuminate\Http\Request;


class PaisController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/paises",
     *     summary="Listar paises",
     *     tags={"Paises"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de paises"
     *     )
     * )
     */
    public function index()
    {
        $repository = new PaisRepository();
        $paises = $repository->index();
        return $paises;
    }

    /**
     * @OA\Post(
     *     path="/api/paises",
     *     summary="Crear pais",
     *     tags={"Paises"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre"},
     *           @OA\Property(property="nombre", type="string", example="Argentina"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pais creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new PaisRepository();
        $pais = $repository->create($request->all());
        return $pais;
    }
    /**
     * @OA\Put(
     *     path="/api/paises/{id}",
     *     summary="Actualizar pais",
     *     tags={"Paises"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la pais",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre"},
     *             @OA\Property(property="nombre", type="string", example="Argentina"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pais actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pais no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new PaisRepository();
        $pais = $repository->update($id, $request->all());
        return $pais;
    }

    /**
     * @OA\Delete(
     *     path="/api/paises/{id}",
     *     summary="Eliminar pais",
     *     tags={"Paises"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la pais",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Pais eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pais no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new PaisRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}