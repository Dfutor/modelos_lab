<?php

namespace App\Repository;
use App\Models\Nota;


class NotaRepository
{
    public function index()
    {
        return Nota::all();
    }

    public function create(array $data)
    {
        return Nota::create($data);
    }

    public function update($id, array $data)
    {
        $nota = Nota::findOrFail($id);
        $nota->update($data);
        return $nota;
    }

    public function delete($id)
    {
        return Nota::destroy($id);
    }
}