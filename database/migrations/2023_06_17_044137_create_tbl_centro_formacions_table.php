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
        Schema::create('tbl_centro_formacions', function (Blueprint $table) {
            $table->id('Codigo');
            $table->string('cent_Denominacion');

            $table->unsignedBigInteger('Codigo_regional')->nullable();
            $table->foreign('Codigo_Regional')->references('Codigo')->on('tbl_regionales');

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
        Schema::dropIfExists('tbl_centro_formacions');
    }
};
