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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('id_res');
            $table->string('resp');
            $table->tinyInteger('token')->comment('0: correcta, 1: incorrecta');
            $table->unsignedBigInteger('preguntas_id');
            $table->timestamps();

            $table->foreign('preguntas_id')->references('id_preguntas')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
