<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->foreignId('id_sede')
                ->constrained('sedes')
                ->onDelete('cascade');
            $table->string('codigo')
                ->unique()
                ->nullable();
            $table->integer('capacidad')
                ->nullable();
            $table->enum('tipo', ['aula', 'laboratorio', 'auditorio']);
            $table->string('descripcion', 255)
                ->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};