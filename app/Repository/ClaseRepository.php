<?php

namespace App\Repository;
use App\Models\Clase;


class ClaseRepository
{
    public function index()
    {
        return Clase::all();
    }

    public function create(array $data)
    {
        return Clase::create($data);
    }

    public function update($id, array $data)
    {
        $clase = Clase::findOrFail($id);
        $clase->update($data);
        return $clase;
    }

    public function delete($id)
    {
        return Clase::destroy($id);
    }
}