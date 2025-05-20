<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\ClaseRepository;

use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clases",
     *     summary="Listar clases",
     *     tags={"Clases"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de clases"
     *     )
     * )
     */
    public function index()
    {
        $repository = new ClaseRepository();
        $clases = $repository->index();
        return $clases;
    }

    /**
     * @OA\Post(
     *     path="/api/clases",
     *     summary="Crear clase",
     *     tags={"Clases"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre","apellido"}, 
     *             @OA\Property(property="nombre", type="string", example="Juan"),
     *             @OA\Property(property="apellido", type="string", example="Pérez")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Clase creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new ClaseRepository();
        $clase = $repository->create($request->all());
        return $clase;
    }
    /**
     * @OA\Put(
     *     path="/api/clases/{id}",
     *     summary="Actualizar clase",
     *     tags={"Clases"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre","apellido"},
     *             @OA\Property(property="nombre", type="string", example="Juan"),
     *             @OA\Property(property="apellido", type="string", example="Pérez")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Clase actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new ClaseRepository();
        $clase = $repository->update($id, $request->all());
        return $clase;
    }

    /**
     * @OA\Delete(
     *     path="/api/clases/{id}",
     *     summary="Eliminar clase",
     *     tags={"Clases"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la clase",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Clase eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clase no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new ClaseRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}