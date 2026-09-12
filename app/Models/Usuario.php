<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombres',
        'cedula',
        'direccion',
        'telefono',
        'estado',
    ];
}