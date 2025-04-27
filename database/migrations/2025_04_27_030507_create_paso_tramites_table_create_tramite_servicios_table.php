<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tramite_servicios', function (Blueprint $table) {
            $table->id();
            
            $table->string('origen')->nullable();
            $table->string('fundamento_tramite')->nullable();
            $table->string('nombre_tramite')->nullable();
            $table->text('descripcion')->nullable();
            $table->json('tipo')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('formato_requerido')->nullable();
            
            //pasos
            $table->unsignedBigInteger('fk_pasos')->nullable();


            $table->unsignedBigInteger('fk_areasObligada')->nullable();
            $table->unsignedBigInteger('fk_archivoFormato')->nullable();
            $table->text('fundamentoTramiteServicio')->nullable();
            $table->unsignedBigInteger('fk_requisitos')->nullable();
            $table->text('fundamentoRequisitos')->nullable();
            $table->unsignedBigInteger('fk_archivoDocumentos')->nullable();

            $table->text('fundamentoFormatos')->nullable();
            $table->string('objetivoInspeccion')->nullable();
            $table->string('fundamentoInspeccion')->nullable();
            $table->string('plazoSujetoObligado')->nullable();
            $table->string('plazoPrevencion')->nullable();
            $table->string('plazoCumplirPrevencion')->nullable();
            $table->text('fundamentoPlazo')->nullable();

            $table->unsignedBigInteger('fk_montos')->nullable();
            $table->text('fundamentoMonto')->nullable();
            $table->string('vigenciaAvisos')->nullable();
            $table->text('fundamentoVigencia')->nullable();
            $table->unsignedBigInteger('fk_criterios')->nullable();
            $table->text('fundamentoCriterios')->nullable();
            $table->unsignedBigInteger('fk_areasAdministrativa')->nullable();

            $table->unsignedBigInteger('fk_sitioWeb')->nullable();
            $table->text('otroMedioConsultasDocumentosQuejas')->nullable();
            $table->text('informacionAConservar')->nullable();
            $table->text('fundamentoInformacionAConservar')->nullable();

            $table->boolean('enLineaExclusiva')->nullable();
            $table->boolean('subirDocumentosEnLinea')->nullable();
            $table->boolean('seguimientoDeEstatus')->nullable();
            $table->boolean('acusesEnLinea')->nullable();
            $table->boolean('resoluciónPorInternet')->nullable();
            $table->boolean('requiereFirmaElectronica')->nullable();

            $table->text('demasInformacion')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tramite_servicios');
    }
};
