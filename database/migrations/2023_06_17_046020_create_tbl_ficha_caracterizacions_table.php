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
        Schema::create('tbl_ficha_caracterizacions', function (Blueprint $table) {
            $table->id('Codigo');
            $table->integer('fich_Codigo');
            $table->date('fich_Inicio');
            $table->date('fich_Fin');
            $table->string('fich_Etapa',45);

            //relaciones con otras tablas
            $table->unsignedBigInteger('Codigo_programa')->nullable();
            $table->foreign('Codigo_programa')->references('Codigo')->on('tbl_programas');

            $table->unsignedBigInteger('Codigo_modalidad')->nullable();
            $table->foreign('Codigo_modalidad')->references('Codigo')->on('tbl_modalidads');

            $table->unsignedBigInteger('Codigo_centro')->nullable();
            $table->foreign('Codigo_centro')->references('Codigo')->on('tbl_centro_formacions');
            // $table->foreign('Codigo_modalidad')->references('Codigo')->on('tbl_modalidads');
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
        Schema::dropIfExists('tbl_ficha_caracterizacions');
    }
};
