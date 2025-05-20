<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\CiudadRepository;

use Illuminate\Http\Request;


class CiudadController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/ciudades",
     *     summary="Listar ciudades",
     *     tags={"Ciudades"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de ciudades"
     *     )
     * )
     */
    public function index()
    {
        $repository = new CiudadRepository();
        $ciudades = $repository->index();
        return $ciudades;
    }

    /**
     * @OA\Post(
     *     path="/api/ciudades",
     *     summary="Crear ciudad",
     *     tags={"Ciudades"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "nombre", "id_pais"},
     *             @OA\Property(property="nombre", type="string", example="Juan"),
     *             @OA\Property(property="id_pais", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ciudad creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new CiudadRepository();
        $ciudad = $repository->create($request->all());
        return $ciudad;
    }
    /** 
     * @OA\Put(
     *     path="/api/ciudades/{id}",
     *     summary="Actualizar ciudad",
     *     tags={"Ciudades"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la ciudad",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={ "nombre", "id_pais"},
     *            @OA\Property(property="nombre", type="string", example="Juan"),
     *            @OA\Property(property="id_pais", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ciudad actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ciudad no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new CiudadRepository();
        $ciudad = $repository->update($id, $request->all());
        return $ciudad;
    }

    /**
     * @OA\Delete(
     *     path="/api/ciudades/{id}",
     *     summary="Eliminar ciudad",
     *     tags={"Ciudades"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la ciudad",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Ciudad eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ciudad no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new CiudadRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}