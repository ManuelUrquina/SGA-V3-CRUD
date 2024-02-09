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
        Schema::create('tbl_perfil_instructors', function (Blueprint $table) {
            $table->id('Codigo');
            $table->string('per_RequisitosAcademicos',45);
            $table->string('per_Experiencia',45);
            $table->string('per_CompetenciasMinimas',45);
            $table->unsignedBigInteger('Codigo_programa');
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
        Schema::dropIfExists('tbl_perfil_instructors');
    }
};
