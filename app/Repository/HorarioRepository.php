<?php

namespace App\Repository;
use App\Models\Horario;


class HorarioRepository
{
    public function index()
    {
        return Horario::all();
    }

    public function create(array $data)
    {
        return Horario::create($data);
    }

    public function update($id, array $data)
    {
        $horario = Horario::findOrFail($id);
        $horario->update($data);
        return $horario;
    }

    public function delete($id)
    {
        return Horario::destroy($id);
    }
}