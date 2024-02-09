<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_programas', function (Blueprint $table) {
            
            $table->id('Codigo');
            $table->integer('prog_codigoPrograma');
            $table->string('prog_Denominacion',300);
            $table->integer('prog_version');
            $table->enum('prog_Estado',['Activo','Inactivo'])->nullable();
            $table->string('prog_HorasEstimadas',45);
            $table->string('prog_Creditos',45);
            $table->text('prog_Descripcion');
            $table->string('prog_DuracionMeses',45);
            $table->enum('prog_NivelFormacion',['Técnico','Tecnólogo'])->nullable();

            $table->integer('prog_etapaLectiva');
            $table->integer('prog_etapaProductiva');
            $table->integer('prog_totalHoras');
            $table->text('prog_justificacion');
            $table->text('prog_metodologia');

            // $table->unsignedBigInteger('Codigo_nivel')->nullable();//llave foranea
            // $table->foreign('Codigo_nivel')->references('Codigo')->on('tbl_nivel_formacions');//relacion
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
        Schema::dropIfExists('tbl_programas');
    }
};
