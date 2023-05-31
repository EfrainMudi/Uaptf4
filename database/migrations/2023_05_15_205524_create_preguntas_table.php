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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id('id_preguntas');
            $table->string('pregunta');
            $table->string('tipo');
            $table->unsignedBigInteger('forms_id');
            $table->timestamps();

            $table->foreign('forms_id')->references('id_forms')->on('formularios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
