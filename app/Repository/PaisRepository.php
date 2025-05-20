<?php

namespace App\Repository;
use App\Models\Pais;


class PaisRepository
{
    public function index()
    {
        return Pais::all();
    }

    public function create(array $data)
    {
        return Pais::create($data);
    }

    public function update($id, array $data)
    {
        $pais = Pais::findOrFail($id);
        $pais->update($data);
        return $pais;
    }

    public function delete($id)
    {
        return Pais::destroy($id);
    }
}