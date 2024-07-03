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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('color');
            $table->string('marca');
            $table->string('tipo');
            $table->unsignedBigInteger('conductores_id');
            $table->unsignedBigInteger('propietarios_id');
            $table->timestamps();

           
            $table->foreign('conductores_id')->references('id')->on('conductores')->onDelete('cascade');
            $table->foreign('propietarios_id')->references('id')->on('propietarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
