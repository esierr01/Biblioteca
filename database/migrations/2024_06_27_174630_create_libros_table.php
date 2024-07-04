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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();

            $table->boolean('estatus');
            $table->string('caratula', 120);
            $table->string('titulo', 120);
            $table->year('ano_publica');
            $table->string('autor', 120);
            $table->smallInteger('edicion');
            $table->smallInteger('ejemplares');
            $table->smallInteger('disponibles');
            $table->date('fecha_eliminado')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
