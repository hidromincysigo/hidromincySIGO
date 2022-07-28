<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-users', 'crear-users', 'editar-users','borrar-users',
            'ver-roles', 'crear-roles', 'editar-roles','borrar-roles',
            /// ---------------------- ROLES PRINCIPALES 
                          
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
