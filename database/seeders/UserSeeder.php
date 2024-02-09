<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            User::create([
                'name' => " usuario Admin",
                'email' => "admin@admin.com",
                'password' => bcrypt('123456789'),
                'fechaVencida' => '2100-08-31'
            ])->assignRole('admin');

            User::create([
                'name' => "usuario instructor",
                'email' => "Prueba2@Prueba.com",
                'password' => bcrypt('123456789'),
                'fechaVencida' => '2024-08-31'
            ])->assignRole('instructor');

            User::create([
                'name' => "usuario aprendiz",
                'email' => "Prueba3@Prueba.com",
                'password' => bcrypt('123456789'),
                'fechaVencida' => '2024-08-31'
            ])->assignRole('aprendiz');

        

    }
}
