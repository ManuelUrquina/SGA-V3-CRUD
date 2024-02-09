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
        Schema::create('tbl_nivel_formacions', function (Blueprint $table) {
            
            $table->bigIncrements('Codigo');
            // $table->string('niv_Denominacion',255)->default(0);
            $table->enum('niv_Denominacion',['Tecnico','Tecnologo'])->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_nivel_formacions');
    }
};
