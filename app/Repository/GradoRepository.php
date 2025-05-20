<?php

namespace App\Repository;
use App\Models\Grado;


class GradoRepository
{
    public function index()
    {
        return Grado::all();
    }

    public function create(array $data)
    {
        return Grado::create($data);
    }

    public function update($id, array $data)
    {
        $grado = Grado::findOrFail($id);
        $grado->update($data);
        return $grado;
    }

    public function delete($id)
    {
        return Grado::destroy($id);
    }
}