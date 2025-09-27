<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de usuarios</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #dddddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Listado de usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Contraseña</th>
                <th>Facultad</th>
                <th>Carnet</th>
                <th>Estado solicitud</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->nombre }}</td>
                    <td>{{ $solicitud->password }}</td>
                    <td>{{ $solicitud->facultad }}</td>
                    <td>{{ $solicitud->carnet }}</td>
                    <td>{{ $solicitud->estado_solicitud }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>