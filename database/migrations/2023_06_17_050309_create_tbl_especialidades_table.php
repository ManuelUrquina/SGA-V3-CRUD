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
        Schema::create('tbl_especialidades', function (Blueprint $table) {
            $table->id('Codigo');
            $table->string('esp_Denominacion',255);
            $table->unsignedBigInteger('Codigo_red');
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
        Schema::dropIfExists('tbl_especialidades');
    }
};
