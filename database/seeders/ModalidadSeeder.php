<?php

namespace Database\Seeders;

use App\Models\TblModalidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TblModalidad::create([
            'mod_Denominacion' => 'Presencial'
        ]);

        TblModalidad::create([
            'mod_Denominacion' => 'Virtual'
        ]);
    }
}
