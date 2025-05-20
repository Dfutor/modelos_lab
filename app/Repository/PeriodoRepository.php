<?php

namespace App\Repository;
use App\Models\Periodo;


class PeriodoRepository
{
    public function index()
    {
        return Periodo::all();
    }

    public function create(array $data)
    {
        return Periodo::create($data);
    }

    public function update($id, array $data)
    {
        $periodo = Periodo::findOrFail($id);
        $periodo->update($data);
        return $periodo;
    }

    public function delete($id)
    {
        return Periodo::destroy($id);
    }
}