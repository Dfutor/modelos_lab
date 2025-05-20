<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_estudiante')
                ->constrained('estudiantes')
                ->onDelete('cascade');
            $table->foreignId('id_clase')
                ->constrained('clases')
                ->onDelete('cascade');
            $table->foreignId('id_periodo')
                ->constrained('periodos')
                ->onDelete('cascade');
            $table->float('valor');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};