<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roupas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('foto', 200);
            $table->string('tipo', 200)->nullable();
            $table->string('marca', 200)->nullable();
            $table->string('tamanho', 200)->nullable();
            $table->boolean('situacao');
            $table->decimal('preco', 8, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table');
    }
};
