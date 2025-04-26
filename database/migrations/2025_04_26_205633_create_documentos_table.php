<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('clase')->nullable();
            $table->string('tipo_formato')->nullable();
            $table->string('formato')->nullable(); 
            $table->string('archivo')->nullable(); 
            $table->string('url')->nullable();
            $table->date('ultima_fecha_publicacion')->nullable();
            $table->string('fundamento_documento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
