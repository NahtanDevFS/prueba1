@extends('layouts.app')

@section('content')
<h1>Solicitudes de Cambio de Contraseña</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="d-flex justify-content-between mb-3">
    <div>
        <a href="{{ route('solicitud_cambio_contraseñas.create') }}" class="btn btn-primary">Agregar estudiante</a>
        <a href="{{ route('solicitud_cambio_contraseñas.export.exportPdf') }}" class="btn btn-danger">Export to PDF</a>
        <a href="{{ route('solicitud_cambio_contraseñas.export.exportExcel') }}" class="btn btn-success">Export to Excel</a>
    </div>
</div>
<form action="{{ route('solicitud_cambio_contraseñas.index') }}" method="get">
    <div class="input-group mb-3">
        <input type="text" name="carnet" class="form-control" placeholder="Buscar por carnet" value="{{ request()->input('carnet') }}">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Password</th>
            <th>Facultad</th>
            <th>Carnet</th>
            <th>Estado Solicitud</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($solicitudes as $solicitud)
        <tr>
            <td>{{ $solicitud->id }}</td>
            <td>{{ $solicitud->nombre }}</td>
            <td>{{ $solicitud->password }}</td>
            <td>{{ $solicitud->facultad }}</td>
            <td>{{ $solicitud->carnet }}</td>
            <td>{{ $solicitud->estado_solicitud }}</td>
            <td>
                <a href="{{ route('solicitud_cambio_contraseñas.edit', $solicitud) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('solicitud_cambio_contraseñas.destroy', $solicitud) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $solicitudes->links() }}
@endsection
