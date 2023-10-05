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
        Schema::create('inmobiliarios', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->enum('tipo_solicitud', ['Primera Vez', 'Renovación']);
            $table->date('fecha_de_instalacion');
            $table->date('fecha_de_retiro');
            $table->integer('Ancho_predio');
            $table->integer('largo_predio');
            $table->integer('Area_Total_predio');
            $table->integer('numero_de_elemento_valla')->nullable();
            $table->integer('Ancho_valla')->nullable();
            $table->integer('Alto_valla')->nullable();
            $table->integer('Area_Total_valla')->nullable();
            $table->integer('numero_de_elementos_aviso')->nullable();
            $table->integer('Ancho_aviso')->nullable();
            $table->integer('Alto_aviso')->nullable();
            $table->integer('Area_Total_aviso')->nullable();
            $table->integer('numero_de_encerramiento')->nullable();
            $table->integer('Ancho_encerramiento')->nullable();
            $table->integer('Alto_encerramiento')->nullable();
            $table->integer('Area_Total_encerramiento')->nullable();
            $table->integer('numero_de_elementos_otro')->nullable();
            $table->string('otro')->nullable();
            $table->integer('Ancho_otro')->nullable();
            $table->integer('Alto_otro')->nullable();
            $table->integer('Area_Total_otro')->nullable();

            $table->unsignedBigInteger('persona_id');
            $table->string('fotomontaje');
            $table->string('Camara_de_comercio');
            $table->string('RUT');
            $table->string('Licencia_de_construcion');
            $table->string('Carta_escrita_de_solicitud');
            $table->string('permiso_anterior')->nullable();
            $table->foreign('persona_id')->references('id')->on('solicitudes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmobiliarios');
    }
};
