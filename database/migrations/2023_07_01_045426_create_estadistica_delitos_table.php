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
        Schema::create('estadistica_delitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numeroDelitosCometidos');
            $table->string('delitosComunesCometidos');
            $table->foreignId('delito_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadistica_delitos');
    }
};
