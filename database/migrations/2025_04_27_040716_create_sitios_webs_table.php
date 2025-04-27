<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sitios_webs', function (Blueprint $table) {
            $table->id();
            $table->text('url')->nullable(); // URL del sitio web
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sitios_webs');
    }
};
