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
        Schema::create('tbl_ambientes', function (Blueprint $table) {
            $table->id('Codigo');
            $table->string('amb_Denominacion',45);
            $table->integer('amb_Cupo');
            $table->unsignedBigInteger('Codigo_tipo')->nullable();
            $table->unsignedBigInteger('Codigo_estado')->nullable();
            $table->foreign('Codigo_tipo')->references('Codigo')->on('tbl_tipo_ambientes');
            $table->foreign('Codigo_estado')->references('Codigo')->on('tbl_estado_ambientes');
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
        Schema::dropIfExists('tbl_ambientes');
    }
};
