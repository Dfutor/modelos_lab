<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\PersonaRepository;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $repository = new PersonaRepository();
        $personas = $repository->index();
        return $personas;
    }

    public function store(Request $request)
    {
        $repository = new PersonaRepository();
        $persona = $repository->create($request->all());
        return $persona;
    }

    public function update(Request $request, $id)
    {
        $repository = new PersonaRepository();
        $persona = $repository->update($id, $request->all());
        return $persona;
    }

    public function destroy($id)
    {
        $repository = new PersonaRepository();
        $repository->delete($id);
        return response()->noContent();
    }
}