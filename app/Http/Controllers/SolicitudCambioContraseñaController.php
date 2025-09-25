<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCambioContraseña;

class SolicitudCambioContraseñaController extends Controller
{
    public function index(Request $request)
    {
        $carnet = $request->input('carnet', '');
        $solicitudes = SolicitudCambioContraseña::when($carnet, function ($query) use ($carnet) {
            return $query->where('carnet', 'like', '%' . $carnet . '%');
        })->paginate(10);

        return view('solicitud_cambio_contraseñas.index', compact('solicitudes'));
    }

    public function create()
    {
        return view('solicitud_cambio_contraseñas.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'password' => 'required|string|min:4|confirmed',
            'facultad' => 'required|string|max:255',
            'carnet' => 'required|string|max:50|unique:solicitud_cambio_contraseñas',
        ]);

        SolicitudCambioContraseña::create($validatedData);

        return redirect()->route('solicitud_cambio_contraseñas.index')->with('success', 'Solicitud creada exitosamente.');
    }

    public function show(SolicitudCambioContraseña $solicitud)
    {
        return view('solicitud_cambio_contraseñas.show', compact('solicitud'));
    }

    public function edit(SolicitudCambioContraseña $solicitud)
    {
        return view('solicitud_cambio_contraseñas.edit', compact('solicitud'));
    }

    public function update(Request $request, SolicitudCambioContraseña $solicitud)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'password' => 'nullable|string|min:4|confirmed',
            'facultad' => 'required|string|max:255',
            'carnet' => 'required|string|max:50|unique:solicitud_cambio_contraseñas,' . $solicitud->id,
        ]);

        $solicitud->update($validatedData);

        return redirect()->route('solicitud_cambio_contraseñas.index')->with('success', 'Solicitud actualizada exitosamente.');
    }

    public function destroy(SolicitudCambioContraseña $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('solicitud_cambio_contraseñas.index')->with('success', 'Solicitud eliminada exitosamente.');
    }
}
