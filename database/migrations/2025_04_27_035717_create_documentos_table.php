<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(); // Nombre del documento (nuevo)
            $table->string('tipo_formato')->nullable(); // Ej: PDF, Word, Excel
            $table->string('archivo')->nullable(); // Ruta o nombre de archivo
            $table->date('ultima_fecha_publicacion')->nullable(); // Fecha de publicación
            $table->text('fundamento_juridico')->nullable(); // Fundamento jurídico
            $table->string('tipo')->nullable(); // Categoría u otro tipo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
