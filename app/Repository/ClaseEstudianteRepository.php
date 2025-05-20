<?php

namespace App\Repository;
use App\Models\ClaseEstudiante;


class ClaseEstudianteRepository
{
    public function index()
    {
        return ClaseEstudiante::all();
    }

    public function create(array $data)
    {
        return ClaseEstudiante::create($data);
    }

    public function update($id, array $data)
    {
        $claseEstudiante = ClaseEstudiante::findOrFail($id);
        $claseEstudiante->update($data);
        return $claseEstudiante;
    }

    public function delete($id)
    {
        return ClaseEstudiante::destroy($id);
    }
}