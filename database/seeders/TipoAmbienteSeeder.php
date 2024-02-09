<?php

namespace Database\Seeders;

use App\Models\TblEstadoAmbiente;
use App\Models\TblTipoAmbiente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoAmbienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TblTipoAmbiente::create([
            'tip_Denominacion' => 'ambiente pluritecnológico'
        ]);
        TblTipoAmbiente::create([
            'tip_Denominacion' => 'ambiente polivalente'
        ]);
        TblTipoAmbiente::create([
            'tip_Denominacion' => 'auditorio'
        ]);
        TblTipoAmbiente::create([
            'tip_Denominacion' => 'ambiente virtual'
        ]);
        TblTipoAmbiente::create([
            'tip_Denominacion' => 'campo deportivo'
        ]);

        // -------------------
        // Estado AMb
        TblEstadoAmbiente::create([
            'est_Denominacion' => 'Habilitado'
        ]);
        TblEstadoAmbiente::create([
            'est_Denominacion' => 'No Habilitado'
        ]);

    }
}
