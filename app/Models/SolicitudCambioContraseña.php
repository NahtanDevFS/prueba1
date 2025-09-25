<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCambioContraseña extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'password',
        'facultad',
        'carnet',
        'estado_solicitud',
    ];
}
