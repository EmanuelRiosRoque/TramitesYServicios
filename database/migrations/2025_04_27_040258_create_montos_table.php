<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('montos', function (Blueprint $table) {
            $table->id();
            $table->string('monto')->nullable(); // Monto, puedes ajustarlo a decimal si quieres (ej: decimal(10,2))
            $table->text('fundamento_monto')->nullable(); // Fundamento jurídico o descripción del monto
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('montos');
    }
};
