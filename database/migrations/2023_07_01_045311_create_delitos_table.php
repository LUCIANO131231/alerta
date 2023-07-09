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
            $table->string('descripcion');
            $table->enum('tipo', ['Robo','Hurto','Vandalismo','Homicidio','Violación','Estafa','Agresión','Secuestro','Tráfico de drogas','Amenazas','Extorsión','Abuso sexual','Violencia doméstica','Maltrato infantil','Delitos informáticos','Delitos medioambientales']);
            $table->dateTime('fechaHoraDelito');
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
