<?php

namespace App\Repository;
use App\Models\Persona;


class PersonaRepository
{
    public function index()
    {
        return Persona::all();
    }

    public function create(array $data)
    {
        return Persona::create($data);
    }

    public function update($id, array $data)
    {
        $persona = Persona::findOrFail($id);
        $persona->update($data);
        return $persona;
    }

    public function delete($id)
    {
        return Persona::destroy($id);
    }
}