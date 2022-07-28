<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     

        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'admin@admin.com',         
            'password' => bcrypt('123456789'),
        ]);
        $user->assignRole('Administrador');
          
    }
}
