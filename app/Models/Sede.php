<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Direccion;

class Sede extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'sedes';

    protected $fillable = [
        'nombre','direccion','id_direccion'
    ];

    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'id_direccion');
    }
}

