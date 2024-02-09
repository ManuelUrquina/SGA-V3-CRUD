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
        Schema::create('tbl_competencias', function (Blueprint $table) {
            $table->id('Codigo');
            $table->integer('comp_codigoCompetencia');
            $table->text('comp_Denominacion')->nullable();
            $table->string('comp_VersionNCl');
            $table->string('comp_DuracionEstimada');
            $table->integer('comp_Creditos');
            // $table->integer('comp_Horas');
            $table->integer('comp_Horas_FI');
            
            $table->unsignedBigInteger('Codigo_programa')->nullable();            
            $table->foreign('Codigo_programa')->references('Codigo')->on('tbl_programas');

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
        Schema::dropIfExists('tbl_competencias');
    }
};
