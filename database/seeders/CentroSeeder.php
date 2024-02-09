<?php

namespace Database\Seeders;

use App\Models\TblCentro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TblCentro::create([
            'cent_Denominacion' => 'Centro Acuícola Y Agroindustrial'
        ]);
        TblCentro::create([
            'cent_Denominacion' => 'Centro De Logística Y Promoción Ecoturística'
        ]);
    }
}
