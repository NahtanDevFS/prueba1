<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCambioContrasena;
use App\Exports\SolicitudesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf; // Importante para PDF

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
        //dd($request->all()); // (dump and die)
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'password' => 'required|string|min:4|confirmed',
            'facultad' => 'required|string|max:255',
            'carnet' => 'required|string|max:50|unique:solicitud_cambio_contraseñas',
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
            'password' => 'nullable|string|min:4|confirmed',
            'facultad' => 'required|string|max:255',
            'estado_solicitud' => 'required|string|in:pendiente,actualizada',
            'carnet' => 'required|string|max:50|unique:solicitud_cambio_contraseñas,carnet,' . $solicitud->id
        ]);

        //si no se envió una nueva contraseña, no se actualiza
    if (empty($validatedData['password'])) {
        unset($validatedData['password']);
    }

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
