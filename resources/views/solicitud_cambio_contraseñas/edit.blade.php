@extends('layouts.app')

@section('content')
<h1>Editar Solicitud de Cambio de Contraseña</h1>
<form action="{{ route('solicitud_cambio_contraseñas.update', $solicitud) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $solicitud->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirmar Password</label>
        <input type="password" name="confirm_password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="facultad" class="form-label">Facultad</label>
        <input type="text" name="facultad" class="form-control" value="{{ $solicitud->facultad }}" required>
    </div>
    <div class="mb-3">
        <label for="carnet" class="form-label">Carnet</label>
        <input type="text" name="carnet" class="form-control" value="{{ $solicitud->carnet }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
