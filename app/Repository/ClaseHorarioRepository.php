<?php

namespace App\Repository;
use App\Models\ClaseHorario;


class ClaseHorarioRepository
{
    public function index()
    {
        return ClaseHorario::all();
    }

    public function create(array $data)
    {
        return ClaseHorario::create($data);
    }

    public function update($id, array $data)
    {
        $claseHorario = ClaseHorario::findOrFail($id);
        $claseHorario->update($data);
        return $claseHorario;
    }

    public function delete($id)
    {
        return ClaseHorario::destroy($id);
    }
}