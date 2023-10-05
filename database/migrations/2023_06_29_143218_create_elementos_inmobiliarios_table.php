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
        Schema::create('elementos_inmobiliarios', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_de_elementos');
            $table->string('nombre');
            $table->decimal('ancho', 8, 2);
            $table->decimal('alto', 8, 2);
            $table->decimal('area_total', 10, 2);
            $table->unsignedBigInteger('id_inmobiliario');
            $table->foreign('id_inmobiliario')->references('id')->on('inmobiliarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_inmobiliarios');
    }
};



