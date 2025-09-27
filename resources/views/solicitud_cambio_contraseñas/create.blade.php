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
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="facultad" class="form-label">Facultad</label>
        <input type="text" name="facultad" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="carnet" class="form-label">Carnet</label>
        <input type="text" name="carnet" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
@endsection
