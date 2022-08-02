<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DiqueToma;

class DiqueTomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiqueToma::create(array('id' => '2','reg' => '20210216010407','nombre' => 'MARASMITA-CAPAYA','estado' => '15','municipio' => '180','parroquia' => '17','desc_ubicacion' => 'Barlovento','utm_a' => '1','utm_b' => '1','acueducto' => '5','toma_rio' => 'RÃ­o Masmarita','caudal_diseno' => '110.00','caudal_recibe' => '120.00','status' => '1'));
        DiqueToma::create(array('id' => '3','reg' => '20210216010744','nombre' => 'Quebrada La Virgen','estado' => '15','municipio' => '186','parroquia' => '2','desc_ubicacion' => 'Entrada PDVSA','utm_a' => '0','utm_b' => '0','acueducto' => '1','toma_rio' => 'Quebrada de la Virgen','caudal_diseno' => '30.00','caudal_recibe' => '0.00','status' => '1'));
        DiqueToma::create(array('id' => '4','reg' => '20210325054840','nombre' => 'LA CHURCA ','estado' => '15','municipio' => '197','parroquia' => '13','desc_ubicacion' => 'SECTOR VALLE ARRIBA ','utm_a' => '100','utm_b' => '110','acueducto' => '4','toma_rio' => 'RIO LA CHURCA','caudal_diseno' => '240.00','caudal_recibe' => '220.00','status' => '1'));
    }
}
