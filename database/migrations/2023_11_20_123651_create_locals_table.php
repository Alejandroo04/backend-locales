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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubicacion');
            $table->string('telefono');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('subcategoria_id');
            $table->unsignedBigInteger('encargado_id')->nullable();
            $table->unsignedBigInteger('representante_legal_id')->nullable();
            $table->timestamps();
            $table->boolean('status');

            $table->foreign('categoria_id')->references('id')->on('categories');
            $table->foreign('subcategoria_id')->references('id')->on('subcategories');
            $table->foreign('encargado_id')->references('id')->on('users');
            $table->foreign('representante_legal_id')->references('id')->on('users');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
