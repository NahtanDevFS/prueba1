<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudCambioContraseñaController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('solicitud_cambio_contraseñas/export/exportExcel', [SolicitudCambioContraseñaController::class, 'exportExcel'])->name('solicitud_cambio_contraseñas.export.exportExcel');
Route::get('solicitud_cambio_contraseñas/export/exportPdf', [SolicitudCambioContraseñaController::class, 'exportPdf'])->name('solicitud_cambio_contraseñas.export.exportPdf');

Route::resource('solicitud_cambio_contraseñas', SolicitudCambioContraseñaController::class)->parameters(['solicitud_cambio_contraseñas' => 'solicitud']);

Route::get('/', function(){
    return redirect()->route('solicitud_cambio_contraseñas.index');
});
