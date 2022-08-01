<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,            
            RoleHasPermissionSeeder::class,
            UsersTableSeeder::class,
            VenezuelaTableSeeder::class,
            AcueductosTableSeeder::class,
            DiqueTomaSeeder::class,
        ]);
    }
}
