<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inmuebles_tramite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite_servicio_id'); // 🔥 FK al trámite
            $table->unsignedBigInteger('id_inmueble'); // 🔥 FK al catálogo de inmuebles
            $table->string('piso')->nullable(); // Piso (opcional)
            $table->string('unidad_administrativa')->nullable(); // Unidad administrativa (opcional)
            $table->timestamps();

            // 🔥 Relación al trámite
            $table->foreign('tramite_servicio_id')
                  ->references('id')
                  ->on('tramite_servicios')
                  ->onDelete('cascade');

            // 🔥 Relación al catálogo de inmuebles
            $table->foreign('id_inmueble')
                  ->references('id')
                  ->on('catalogo_inmuebles')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inmuebles_tramite');
    }
};
