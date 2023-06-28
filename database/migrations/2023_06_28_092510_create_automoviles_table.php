<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
{
    Schema::create('automoviles', function (Blueprint $table) {
        $table->id();
        $table->string('placa');
        $table->string('tipo_de_vehiculo');
        $table->decimal('lateral_izquierdo', 8, 2);
        $table->decimal('lateral_derecho', 8, 2);
        $table->decimal('posterior', 8, 2);
        $table->decimal('area_total', 8, 2);
        $table->unsignedBigInteger('movil_id');
        $table->timestamps();

        $table->foreign('movil_id')->references('id')->on('moviles');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automoviles');
    }
};
