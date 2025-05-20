<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clase;
use App\Models\Horario;

class ClaseHorario extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'clases_horarios';
    protected $fillable = [
        'id_clase', 'id_horario'
    ];

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_clase');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
}

