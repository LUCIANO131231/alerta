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
        Schema::create('categoria_delitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('categoria',['Crimen','Violencia','Delitos contra la propiedad','Delitos contra la persona','Delitos sexuales','Delitos informáticos','Delitos de drogas','Delitos de tráfico','Delitos contra la integridad física','Delitos contra la seguridad pública','Delitos medioambientales','Delitos de odio','Delitos contra la libertad','Delitos contra el patrimonio cultural','Delitos contra la salud pública']);
            $table->enum('nivel',['Bajo','Medio','Alto','Crítico']);
            $table->foreignId('delito_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_delitos');
    }
};
