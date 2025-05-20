<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede;
use App\Models\Aula;
use App\Models\Grado;

class Clase extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'clases';
    protected $fillable = [
        'nombre', 'descripcion', 'id_sede', 'id_aula', 'id_grado'
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'id_aula');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }
}

