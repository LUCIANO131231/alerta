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
        Schema::create('ubicacion_delitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lugar');
            $table->decimal('latitud', 10, 8);
            $table->decimal('longitud', 11, 8);
            $table->foreignId('usuario_id')->constrained();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicacion_delitos');
    }
};
