<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('domicilio_unidad_administrativa')->nullable();
            $table->string('piso')->nullable();
            $table->string('unidad_administrativa')->nullable();
            $table->string('horario_atencion')->nullable();
            $table->string('area')->nullable();
            $table->string('telefono')->nullable();
            $table->string('area_telefono')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
