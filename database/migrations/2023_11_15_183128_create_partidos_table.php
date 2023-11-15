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
            $table->id()->unique();
            $table->unsignedBigInteger('equipo_local');
            $table->unsignedBigInteger('equipo_visitante');
            $table->enum('ganador', ['equipo_local', 'equipo_visitante']);
            $table->date('fecha');
            $table->timestamps();
    
            $table->foreign('equipo_local')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('equipo_visitante')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
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
 