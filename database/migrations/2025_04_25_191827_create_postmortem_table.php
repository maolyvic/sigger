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
        Schema::create('postmortem', function (Blueprint $table) {
            $table->id();
            $table->integer('certificaciones_causa_natural')->nullable();
            $table->integer('toxicologico')->nullable();
            $table->integer('protocolos_autopsia')->nullable();
            $table->integer('autopsias_realizadas')->nullable();
            $table->integer('odontologia')->nullable();
            $table->integer('antropologia')->nullable();
            $table->integer('radiologia_forense')->nullable();
            $table->integer('vagino_rectal')->nullable();
            $table->integer('fijaciones_fotograficas')->nullable();
            $table->integer('huellas_mordeduras')->nullable();
            $table->integer('evidencias_colectadas')->nullable();
            $table->integer('examen_histologico')->nullable();
            $table->integer('examen_citologico')->nullable();
            $table->integer('protocolos_autopsia_animal')->nullable();
            $table->integer('crematorio')->nullable();
            $table->integer('triaje_lopnna')->nullable();
            $table->integer('botanicas_evidencias_biologica')->nullable();
            $table->integer('quimicas_evidencia_biologica')->nullable();
            $table->integer('quimicos_botanica_evidencia_biologica')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postmortem');
    }
};
