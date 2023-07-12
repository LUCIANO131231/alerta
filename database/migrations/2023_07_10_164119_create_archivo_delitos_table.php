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
        Schema::create('archivo_delitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('usuario_id')->constrained();
            $table->foreignId('delito_id')->constrained();
            $table->string('videoDelito')->nullable();
            $table->string('imagenDelito')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivo_delitos');
    }
};
