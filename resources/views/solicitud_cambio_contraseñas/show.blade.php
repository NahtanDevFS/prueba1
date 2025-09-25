@extends('layouts.app')

@section('content')
<h1>Detalles de Solicitud de Cambio de Contraseña</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <td>{{ $solicitud->id }}</td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td>{{ $solicitud->nombre }}</td>
    </tr>
    <tr>
        <th>Password</th>
        <td>{{ $solicitud->password }}</td>
    </tr>
    <tr>
        <th>Facultad</th>
        <td>{{ $solicitud->facultad }}</td>
    </tr>
    <tr>
        <th>Carnet</th>
        <td>{{ $solicitud->carnet }}</td>
    </tr>
    <tr>
        <th>Estado Solicitud</th>
        <td>{{ $solicitud->estado_solicitud }}</td>
    </tr>
</table>

<a href="{{ route('solicitud_cambio_contraseñas.edit', $solicitud) }}" class="btn btn-primary">Editar</a>
<form action="{{ route('solicitud_cambio_contraseñas.destroy', $solicitud) }}" method="post" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">Eliminar</button>
</form>
@endsection
