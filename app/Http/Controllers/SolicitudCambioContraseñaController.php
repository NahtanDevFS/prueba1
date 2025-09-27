<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCambioContrasena;
use App\Exports\SolicitudesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class SolicitudCambioContraseñaController extends Controller
{
    public function index(Request $request)
    {
        $carnet = $request->input('carnet', '');
        $solicitudes = SolicitudCambioContrasena::when($carnet, function ($query) use ($carnet) {
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
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|in:estudiante,profesor',
            'facultad' => 'required|string|in:sistemas,psicologia,arquitectura',
            'carnet' => 'required|string|max:50|unique:solicitud_cambio_contraseñas',
            'dpi' => 'required|string|max:255',
            'nit' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        SolicitudCambioContrasena::create($validatedData);

        return redirect()->route('solicitud_cambio_contraseñas.index')->with('success', 'Solicitud creada exitosamente.');
    }

    public function show(SolicitudCambioContrasena $solicitud)
    {
        return view('solicitud_cambio_contraseñas.show', compact('solicitud'));
    }

    public function edit(SolicitudCambioContrasena $solicitud)
    {
        return view('solicitud_cambio_contraseñas.edit', compact('solicitud'));
    }

    public function update(Request $request, SolicitudCambioContrasena $solicitud)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|in:estudiante,profesor',
            'facultad' => 'required|string|in:sistemas,psicologia,arquitectura',
            'estado_solicitud' => 'required|string|in:pendiente,actualizada',
            'carnet' => 'required|string|max:50|unique:solicitud_cambio_contraseñas,carnet,' . $solicitud->id,
            'dpi' => 'required|string|max:255',
            'nit' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        $solicitud->update($validatedData);

        return redirect()->route('solicitud_cambio_contraseñas.index')->with('success', 'Solicitud actualizada exitosamente.');
    }

    public function destroy(SolicitudCambioContrasena $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('solicitud_cambio_contraseñas.index')->with('success', 'Solicitud eliminada exitosamente.');
    }

    public function exportPdf() {
        $solicitudes = SolicitudCambioContrasena::all();
        view()->share('solicitudes', $solicitudes);

        $pdf = Pdf::loadView('solicitud_cambio_contraseñas.pdf', ['solicitudes' => $solicitudes]);

        return $pdf->download('solicitudes.pdf');
    }

    public function exportExcel() {
        return Excel::download(new SolicitudesExport, 'solicitudes.xlsx');
    }
}
