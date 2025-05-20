<?php

namespace App\Repository;
use App\Models\Ciudad;


class CiudadRepository
{
    public function index()
    {
        return Ciudad::all();
    }

    public function create(array $data)
    {
        return Ciudad::create($data);
    }

    public function update($id, array $data)
    {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->update($data);
        return $ciudad;
    }

    public function delete($id)
    {
        return Ciudad::destroy($id);
    }
}