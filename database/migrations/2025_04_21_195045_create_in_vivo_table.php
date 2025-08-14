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
        Schema::create('in_vivo', function (Blueprint $table) {
            $table->id();
            $table->integer('reconocimiento_medico')->nullable();
            $table->integer('toxicologico')->nullable();
            $table->integer('diagnostico_mental')->nullable();
            $table->integer('odontologia')->nullable();
            $table->integer('antropologia')->nullable();
            $table->integer('radiologia_forense')->nullable();
            $table->integer('vagino_rectal')->nullable();
            $table->integer('fijaciones_fotograficas')->nullable();
            $table->integer('huellas_mordeduras')->nullable();
            $table->integer('examen_histologico')->nullable();
            $table->integer('examen_citologico')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_vivo');
    }
};
