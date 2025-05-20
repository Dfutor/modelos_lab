<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clases_profesores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_clase')
                ->constrained('clases')
                ->onDelete('cascade');
            $table->foreignId('id_profesor')
                ->constrained('profesores')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clases_profesores');
    }
};