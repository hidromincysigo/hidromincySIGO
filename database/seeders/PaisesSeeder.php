<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Paises;
use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    public function run()
    {
        paises::create([
            'name' => 'Venezuela',
            'prefix' => '58', 
            'deleted_at' => null,
        ]);

    }
    
}