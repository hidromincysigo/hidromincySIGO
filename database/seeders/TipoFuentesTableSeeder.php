<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoFuente;

class TipoFuentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoFuente::create(array('id' => '1','tipo' => 'Embalses'));
        TipoFuente::create(array('id' => '2','tipo' => 'Dique Toma'));
        TipoFuente::create(array('id' => '3','tipo' => 'Toma Rio'));
        TipoFuente::create(array('id' => '4','tipo' => 'Pozo Profundo'));
        TipoFuente::create(array('id' => '5','tipo' => 'Toma Maritima'));
        TipoFuente::create(array('id' => '6','tipo' => 'Galeria Filtrante'));
    }
}
