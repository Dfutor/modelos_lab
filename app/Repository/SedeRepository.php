<?php

namespace App\Repository;
use App\Models\Sede;


class SedeRepository
{
    public function index()
    {
        return Sede::all();
    }

    public function create(array $data)
    {
        return Sede::create($data);
    }

    public function update($id, array $data)
    {
        $sede = Sede::findOrFail($id);
        $sede->update($data);
        return $sede;
    }

    public function delete($id)
    {
        return Sede::destroy($id);
    }
}