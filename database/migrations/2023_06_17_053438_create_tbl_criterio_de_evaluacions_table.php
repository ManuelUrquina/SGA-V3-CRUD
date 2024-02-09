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
        Schema::create('tbl_criterio_de_evaluacions', function (Blueprint $table) {
            $table->id('Codigo');
            $table->text('cri_Denominacion');
            $table->text('cri_Observacion')->nullable();
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
        Schema::dropIfExists('tbl_criterio_de_evaluacions');
    }
};
