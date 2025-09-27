@extends('layouts.app')

@section('content')
<h1>Registrar Solicitud de Cambio de Contraseña</h1>
<a href="{{ route('solicitud_cambio_contraseñas.index') }}" class="btn btn-secondary">Volver</a>
<form action="{{ route('solicitud_cambio_contraseñas.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <select name="rol" id="rol" class="form-control" required>
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="facultad" class="form-label">Facultad</label>
        <select name="facultad" id="facultad" class="form-control" required>
            <option value="sistemas">Sistemas</option>
            <option value="psicologia">Psicología</option>
            <option value="arquitectura">Arquitectura</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="carnet" class="form-label">Carnet</label>
        <input type="text" name="carnet" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="dpi" class="form-label">DPI</label>
        <input type="text" name="dpi" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nit" class="form-label">NIT (Opcional)</label>
        <input type="text" name="nit" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email personal</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
@endsection
