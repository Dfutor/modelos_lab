<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\GradoRepository;

use Illuminate\Http\Request;


class GradoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/grados",
     *     summary="Listar grados",
     *     tags={"Grados"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de grados"
     *     )
     * )
     */
    public function index()
    {
        $repository = new GradoRepository();
        $grados = $repository->index();
        return $grados;
    }

    /**
     * @OA\Post(
     *     path="/api/grados",
     *     summary="Crear grado",
     *     tags={"Grados"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "nombre","id_profesor"},
     *                 @OA\Property(property="nombre", type="string", example="Grado 1"),
     *                 @OA\Property(property="id_profesor", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Grado creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new GradoRepository();
        $grado = $repository->create($request->all());
        return $grado;
    }
    /**
     * @OA\Put(
     *     path="/api/grados/{id}",
     *     summary="Actualizar grado",
     *     tags={"Grados"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la grado",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "nombre","id_profesor"},
*                 @OA\Property(property="nombre", type="string", example="Grado 1"),
*                 @OA\Property(property="id_profesor", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Grado actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Grado no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new GradoRepository();
        $grado = $repository->update($id, $request->all());
        return $grado;
    }

    /**
     * @OA\Delete(
     *     path="/api/grados/{id}",
     *     summary="Eliminar grado",
     *     tags={"Grados"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la grado",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Grado eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Grado no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new GradoRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}