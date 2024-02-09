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
        Schema::create('tbl_vigencias', function (Blueprint $table) {
            $table->id('Codigo');
            $table->integer('vig_Contrato')->unique();
            $table->string('vig_anio');
            $table->date('vig_Inicio');
            $table->date('vig_Fin');
            $table->text('vig_Objetos');    
            $table->unsignedBigInteger('Codigo_red')->nullable();
            $table->foreign('Codigo_red')->references('Codigo')->on('tbl_redes');
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
        Schema::dropIfExists('tbl_vigencias');
    }
};
