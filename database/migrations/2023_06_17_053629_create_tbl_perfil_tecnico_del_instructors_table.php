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
        Schema::create('tbl_perfil_tecnico_del_instructors', function (Blueprint $table) {
            $table->id('Codigo');
            $table->text('per_RequisitosAcademicos');
            $table->text('per_Experiencia');
            $table->text('per_CompetenciasMinimas');
            $table->text('per_Observacion')->nullable();
            $table->unsignedBigInteger('Codigo_ra')->nullable();
            $table->foreign('Codigo_ra')->references('Codigo')->on('tbl_resultado_aprendizajes')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('tbl_perfil_tecnico_del_instructors');
    }
};
