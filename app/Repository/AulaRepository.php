<?php

namespace App\Repository;
use App\Models\Aula;


class AulaRepository
{
    public function index()
    {
        return Aula::all();
    }

    public function create(array $data)
    {
        return Aula::create($data);
    }

    public function update($id, array $data)
    {
        $aula = Aula::findOrFail($id);
        $aula->update($data);
        return $aula;
    }

    public function delete($id)
    {
        return Aula::destroy($id);
    }
}