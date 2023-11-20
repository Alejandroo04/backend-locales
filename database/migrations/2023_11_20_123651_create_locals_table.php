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
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubicacion');
            $table->boolean('status');

            $table->foreignId('dueno_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('category_id')
            ->constrained('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('encargado_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
