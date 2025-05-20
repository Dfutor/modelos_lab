<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede;

class Aula extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'aulas';
    protected $fillable = [
        'nombre', 'id_sede', 'codigo', 'capacidad', 'tipo', 'descripcion'
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }
}

