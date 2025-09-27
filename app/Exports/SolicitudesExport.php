<?php

namespace App\Exports;

use App\Models\SolicitudCambioContrasena;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class SolicitudesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         // Obtenemos todas las tareas para exportar
        return SolicitudCambioContrasena::all();
    }

    /**
     * Define los encabezados de las columnas.
     *
     * @return array
     */

     public function headings(): array
    {
        return [
            'ID',
            'nombre',
            'password',
            'facultad',
            'carnet',
            'estado_solicitud'
        ];
    }

    /**
     * Mapea los datos de cada tarea a las columnas.
     *
     * @param mixed $solicitud
     * @return array
     */
    public function map($solicitud): array
    {
        return [
            $solicitud->id,
            $solicitud->nombre,
            $solicitud->password,
            $solicitud->facultad,
            $solicitud->carnet,
            $solicitud->estado_solicitud
        ];
    }
}
