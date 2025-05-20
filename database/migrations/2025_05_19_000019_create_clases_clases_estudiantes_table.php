<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clases_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_clase')
                ->constrained('clases')
                ->onDelete('cascade');
            $table->foreignId('id_estudiante')
                ->constrained('estudiantes')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clases_estudiantes');
    }
};