<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('rol', length: 10);
            $table->string('descripcion', length:50)->nullable();
            $table->timestamps();
        });

        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('contenido', length: 160);
            $table->integer('lector_id');
            $table->integer('post_id');
            $table->enum('tipo', ['comentario', 'respuesta']);
            $table->integer('me_gusta')->default(0);
            $table->integer('no_me_gusta')->default(0);
            $table->timestamps();
        });

        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('archivo');
            $table->enum('tipo', ['imagen', 'documento', 'imagen_presentacion']);
            $table->integer('post_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
        Schema::dropIfExists('comentarios');
        Schema::dropIfExists('roles');
    }
};
