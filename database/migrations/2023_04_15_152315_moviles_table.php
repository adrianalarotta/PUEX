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
        if (!Schema::hasTable('moviles')) {
            Schema::create('moviles', function (Blueprint $table) {
                $table->id();
                $table->enum('tipo_solicitud', ['Primera Vez', 'Renovación']);
                $table->date('fecha_de_instalacion');
                $table->integer('numero_de_vehiculos');
                $table->unsignedBigInteger('persona_id');
                $table->string('fotomontaje');
                $table->string('Camara_de_comercio');
                $table->string('RUT');
                $table->string('Tarjeta_de_propiedad');
                $table->string('Carta_escrita_de_solicitud');
                $table->string('permiso_anterior')->nullable();
                $table->foreign('persona_id')->references('id')->on('solicitudes');
                $table->timestamps();
            });
         }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moviles');
    }
};
