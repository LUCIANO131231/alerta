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
        Schema::create('delitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipoDelito');
            $table->string('lugarDelito');
            $table->dateTime('horaDelito');
            $table->string('descripcion');
            $table->string('imagenDelito');
            $table->string('videoDelito')->nullable();
            $table->foreignId('usuario_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delitos');
    }
};
