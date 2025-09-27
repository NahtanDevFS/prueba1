@extends('layouts.app')

@section('content')
<h1>Editar Solicitud de Cambio de Contraseña</h1>
<a href="{{ route('solicitud_cambio_contraseñas.index') }}" class="btn btn-secondary">Volver</a>
<form action="{{ route('solicitud_cambio_contraseñas.update', $solicitud) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $solicitud->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <select name="rol" id="rol" class="form-control" required>
            <option value="estudiante" {{ $solicitud->rol == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
            <option value="profesor" {{ $solicitud->rol == 'profesor' ? 'selected' : '' }}>Profesor</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="facultad" class="form-label">Facultad</label>
        <select name="facultad" id="facultad" class="form-control" required>
            <option value="sistemas" {{ $solicitud->facultad == 'sistemas' ? 'selected' : '' }}>Sistemas</option>
            <option value="psicologia" {{ $solicitud->facultad == 'psicologia' ? 'selected' : '' }}>Psicología</option>
            <option value="arquitectura" {{ $solicitud->facultad == 'arquitectura' ? 'selected' : '' }}>Arquitectura</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="carnet" class="form-label">Carnet</label>
        <input type="text" name="carnet" class="form-control" value="{{ $solicitud->carnet }}" required>
    </div>
    <div class="mb-3">
        <label for="dpi" class="form-label">DPI</label>
        <input type="text" name="dpi" class="form-control" value="{{ $solicitud->dpi }}" required>
    </div>
    <div class="mb-3">
        <label for="nit" class="form-label">NIT (Opcional)</label>
        <input type="text" name="nit" class="form-control" value="{{ $solicitud->nit }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email personal</label>
        <input type="email" name="email" class="form-control" value="{{ $solicitud->email }}" required>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ $solicitud->telefono }}" required>
    </div>
    <div class="mb-3">
        <label for="estado_solicitud" class="form-label">Estado</label>
        <select name="estado_solicitud" id="estado_solicitud" class="form-control" required>
            <option value="pendiente" {{ $solicitud->estado_solicitud == 'pendiente' ? 'selected' : '' }}>
                Pendiente
            </option>
            <option value="actualizada" {{ $solicitud->estado_solicitud == 'actualizada' ? 'selected' : '' }}>
                Actualizada
            </option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
