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
        Schema::create('redips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 191)->notNull();
            $table->string('nombre', 191)->notNull();
            $table->text('descripcion')->nullable();
            $table->bigInteger('user_id')->unsigned()->notNull();

            $table->timestamps();
            $table->softDeletes();

            $table->unique('codigo');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redips');
    }
};
