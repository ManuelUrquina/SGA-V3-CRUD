<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        
        //creando roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'instructor']);
        $role3 = Role::create(['name' => 'aprendiz']);
        $role4 = Role::create(['name' => 'gestor']);
        
        //permisos seccion usuarios
        Permission::create(["name" => "usuarios.usuarios"])->assignRole([$role1]);
        Permission::create(['name' => 'usuarios.index'])->assignRole([$role1]);
        Permission::create(['name' => 'usuarios.create'])->assignRole([$role1]);
        Permission::create(['name' => 'usuarios.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'usuarios.destroy'])->assignRole([$role1]);

        // permisos seccion programas
        Permission::create(['name' => 'programas.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'programas.create'])->assignRole([$role1]);
        Permission::create(['name' => 'programas.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'programas.destroy'])->assignRole([$role1]);


        // Permisos sección usuarios
        // $permisosUsuariosAdmin = [
        //     'usuarios.usuarios',
        //     'usuarios.index',
        //     'usuarios.create',
        //     'usuarios.edit',
        //     'usuarios.destroy',
        //     'usuarios.store',
        //     'usuarios.show',
        //     'usuarios.update'
        // ];
        // foreach ($permisosUsuariosAdmin as $permiso) {
        //     $permission = Permission::create(['name' => $permiso]);
        //     $permission->assignRole($role1);
        // }      
        


    }
}
