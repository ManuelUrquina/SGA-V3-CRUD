<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text("descripcion");
            $table->enum('color',['red','blue','green'])->nullable();

            $table->dateTime("start");
            $table->dateTime("end");
            $table->string('horaInicio');
            $table->string('horaFinal');
            
            $table->unsignedBigInteger('Codigo_resultado_aprendizaje')->nullable();
            $table->unsignedBigInteger('Codigo_instructor')->nullable();
            $table->unsignedBigInteger('Codigo_ficha')->nullable();
            $table->unsignedBigInteger('Codigo_ambiente')->nullable();
            $table->unsignedBigInteger('Codigo_competencia')->nullable();
            
            $table->foreign('Codigo_resultado_aprendizaje')->references('Codigo')->on('tbl_resultado_aprendizajes')->onDelete('set null');
            $table->foreign('Codigo_instructor')->references('Codigo')->on('tbl_instructors')->onDelete('set null');
            $table->foreign('Codigo_ficha')->references('Codigo')->on('tbl_ficha_caracterizacions')->onDelete('set null');
            $table->foreign('Codigo_ambiente')->references('Codigo')->on('tbl_ambientes')->onDelete('set null');
            $table->foreign('Codigo_competencia')->references('Codigo')->on('tbl_competencias')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_eventos');
    }
};
