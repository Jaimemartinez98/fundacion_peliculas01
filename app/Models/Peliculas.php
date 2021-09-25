<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;

    protected $table = 'peliculas';

    protected $fillable = [
        'id',
        'nombre_pelicula',
        'director',
        'caratula',
        'fecha_lanzamiento',
        'sinopsis',
        'correcto_contacto',
        'empresa_id',
        'created_at',
        'updated_at'
    ];
}
