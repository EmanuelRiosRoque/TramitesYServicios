<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tramite_servicios', function (Blueprint $table) {
            $table->id();
            //Datos inciales
            $table->text('origen')->nullable();
            $table->string('nombre_tramite_servicio')->nullable();
            $table->text('descripcion_tramite_servicio')->nullable();
            $table->json('tipo')->nullable();
            $table->integer('formato_requerido')->nullable();


            $table->string('modalidad')->nullable();
            $table->text('fundamento_existencia')->nullable();
            $table->text('area_obligada_responsable')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tramite_servicios');
    }
};
