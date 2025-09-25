<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitud_cambio_contraseñas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('password');
            $table->string('facultad');
            $table->string('carnet');
            $table->string('estado_solicitud')->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_cambio_contraseñas');
    }
};
