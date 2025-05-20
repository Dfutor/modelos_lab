<?php

namespace App\Repository;
use App\Models\ClaseProfesor;


class ClaseProfesorRepository
{
    public function index()
    {
        return ClaseProfesor::all();
    }

    public function create(array $data)
    {
        return ClaseProfesor::create($data);
    }

    public function update($id, array $data)
    {
        $claseProfesor = ClaseProfesor::findOrFail($id);
        $claseProfesor->update($data);
        return $claseProfesor;
    }

    public function delete($id)
    {
        return ClaseProfesor::destroy($id);
    }
}