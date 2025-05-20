<?php

namespace App\Repository;
use App\Models\Profesor;


class ProfesorRepository
{
    public function index()
    {
        return Profesor::all();
    }

    public function create(array $data)
    {
        return Profesor::create($data);
    }

    public function update($id, array $data)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->update($data);
        return $profesor;
    }

    public function delete($id)
    {
        return Profesor::destroy($id);
    }
}