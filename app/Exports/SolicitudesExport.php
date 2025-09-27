<?php

namespace App\Exports;

use App\Models\SolicitudCambioContrasena;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class SolicitudesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return SolicitudCambioContrasena::all();
    }


     public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Rol',
            'Facultad',
            'Carnet',
            'DPI',
            'NIT',
            'Email',
            'Teléfono',
            'Estado Solicitud'
        ];
    }
    public function map($solicitud): array
    {
        return [
            $solicitud->id,
            $solicitud->nombre,
            $solicitud->rol,
            $solicitud->facultad,
            $solicitud->carnet,
            $solicitud->dpi,
            $solicitud->nit,
            $solicitud->email,
            $solicitud->telefono,
            $solicitud->estado_solicitud
        ];
    }
}
