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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_local_id');
            $table->unsignedBigInteger('equipo_visitante_id');
            $table->unsignedBigInteger('ganador')->nullable();
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('equipo_local_id')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('equipo_visitante_id')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ganador')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
