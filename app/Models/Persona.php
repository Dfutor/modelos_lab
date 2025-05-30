<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'personas';
    protected $fillable = [
        'nombre', 'apellido', 'fecha_nacimiento', 'telefono', 'correo', 'rol'
    ];
}