<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de solicitudes</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #dddddd; padding: 8px; text-align: left; font-size: 10px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Listado de solicitudes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Facultad</th>
                <th>Carnet</th>
                <th>DPI</th>
                <th>NIT</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Estado solicitud</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->nombre }}</td>
                    <td>{{ $solicitud->rol }}</td>
                    <td>{{ $solicitud->facultad }}</td>
                    <td>{{ $solicitud->carnet }}</td>
                    <td>{{ $solicitud->dpi }}</td>
                    <td>{{ $solicitud->nit }}</td>
                    <td>{{ $solicitud->email }}</td>
                    <td>{{ $solicitud->telefono }}</td>
                    <td>{{ $solicitud->estado_solicitud }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>