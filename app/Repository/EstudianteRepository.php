<?php

namespace App\Repository;
use App\Models\Estudiante;


class EstudianteRepository
{
    public function index()
    {
        return Estudiante::all();
    }

    public function create(array $data)
    {
        return Estudiante::create($data);
    }

    public function update($id, array $data)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($data);
        return $estudiante;
    }

    public function delete($id)
    {
        return Estudiante::destroy($id);
    }
}