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
        Schema::create('tbl_instructors', function (Blueprint $table) {
            $table->id('Codigo');
            $table->bigInteger('inst_Identificacion')->unique()->nullable();
            $table->string('inst_TipoID',40);
            $table->string('inst_Nombres',45);
            $table->string('inst_Apellido',45);
            $table->string('inst_Direccion',255);
            $table->string('inst_Correo',45)->unique();
            $table->string('inst_Telefono',45);
            
            $table->unsignedBigInteger('Codigo_vigencia')->nullable();
            $table->foreign('Codigo_vigencia')->references('Codigo')->on('tbl_vigencias');
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
        Schema::dropIfExists('tbl_instructors');
    }
};
