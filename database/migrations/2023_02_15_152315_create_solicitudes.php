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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->required();
            $table->string('apellido');
            $table->enum('tipo_documento', ['cedula', 'cedula de extrangeria','NIT']);
            $table->string('numero_documento',20);
            $table->enum('tipo_persona', ['natural', 'juridica']);
            $table->string('Razon_Social_Responsable')->nullable();
            $table->string('telefono', 20);
            $table->string('correo_electronico');
            $table->string('direccion');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
