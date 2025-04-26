<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('montos', function (Blueprint $table) {
            $table->id();
            $table->text('monto')->nullable(); // Texto, no decimal
            $table->text('fundamento_monto')->nullable(); // También texto
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('montos');
    }
};
