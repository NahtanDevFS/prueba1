<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCambioContrasena extends Model
{
    use HasFactory;

    protected $table = 'solicitud_cambio_contraseñas';

     protected $fillable = [
        'nombre',
        'rol',
        'facultad',
        'carnet',
        'dpi',
        'nit',
        'email',
        'telefono',
        'estado_solicitud',
    ];
}
