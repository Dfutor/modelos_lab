<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 255)
                ->nullable();
            $table->foreignId('id_sede')
                ->constrained('sedes')
                ->onDelete('cascade');
            $table->foreignId('id_aula')
                ->constrained('aulas')
                ->onDelete('cascade');
            $table->foreignId('id_grado')
                ->constrained('grados')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};