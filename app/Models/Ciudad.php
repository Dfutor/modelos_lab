<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pais;

class Ciudad extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'ciudades';
    protected $fillable = [
        'nombre', 'id_pais'
    ];
    
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais');
    }
}

