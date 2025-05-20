<?php

namespace App\Repository;
use App\Models\Direccion;


class DireccionRepository
{
    public function index()
    {
        return Direccion::all();
    }

    public function create(array $data)
    {
        return Direccion::create($data);
    }

    public function update($id, array $data)
    {
        $direccion = Direccion::findOrFail($id);
        $direccion->update($data);
        return $direccion;
    }

    public function delete($id)
    {
        return Direccion::destroy($id);
    }
}