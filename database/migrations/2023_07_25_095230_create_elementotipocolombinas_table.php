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
        Schema::create('elementotipocolombinas', function (Blueprint $table) {
            $table->id();
            $table->float('Ancho');
            $table->float('Alto');
            $table->float('Area_total');
            $table->unsignedBigInteger('tipocolombina_id');
            $table->timestamps();

            $table->foreign('tipocolombina_id')
                ->references('id')
                ->on('tipocolombinas');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_tipocolombina');
    }
};
