<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\PersonaRepository;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/personas",
     *     summary="Listar personas",
     *     tags={"Personas"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de personas"
     *     )
     * )
     */
    public function index()
    {
        $repository = new PersonaRepository();
        $personas = $repository->index();
        return $personas;
    }

    /**
     * @OA\Post(
     *     path="/api/personas",
     *     summary="Crear persona",
     *     tags={"Personas"},
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
     *         description="Persona creada"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $repository = new PersonaRepository();
        $persona = $repository->create($request->all());
        return $persona;
    }
    /**
     * @OA\Put(
     *     path="/api/personas/{id}",
     *     summary="Actualizar persona",
     *     tags={"Personas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la persona",
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
     *         description="Persona actualizada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Persona no encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $repository = new PersonaRepository();
        $persona = $repository->update($id, $request->all());
        return $persona;
    }

    /**
     * @OA\Delete(
     *     path="/api/personas/{id}",
     *     summary="Eliminar persona",
     *     tags={"Personas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la persona",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Persona eliminada"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Persona no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $repository = new PersonaRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}