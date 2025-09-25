<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudCambioContraseñaController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('solicitud_cambio_contraseñas', SolicitudCambioContraseñaController::class);

Route::get('/', function(){
    return redirect()->route('solicitud_cambio_contraseñas.index');
});
