<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Acueductos;

class AcueductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Acueductos::create(array('id' => '1','nombre' => 'Gerencia Altos Mirandinos','capacidad_distribucion' => '0.00','capacidad_modificada' => '0.00','estado' => 15));
        Acueductos::create(array('id' => '2','nombre' => 'Gerencia Metropolitano','capacidad_distribucion' => '0.00','capacidad_modificada' => '0.00','estado' => 10));
        Acueductos::create(array('id' => '3','nombre' => 'Gerencia Valles del Tuy','capacidad_distribucion' => '0.00','capacidad_modificada' => '0.00','estado' => 15));
        Acueductos::create(array('id' => '4','nombre' => 'Gerencia Guarenas Guatire','capacidad_distribucion' => '0.00','capacidad_modificada' => '0.00','estado' => 15));
        Acueductos::create(array('id' => '5','nombre' => 'Gerencia Barlovento','capacidad_distribucion' => '0.00','capacidad_modificada' => '0.00','estado' => 15));
        Acueductos::create(array('id' => '7','nombre' => 'Gerencia Vargas','capacidad_distribucion' => '0.00','capacidad_modificada' => '0.00','estado' => '22'));
        Acueductos::create(array('id' => '11','nombre' => 'Gerencia Sucre','capacidad_distribucion' => '0.00','capacidad_modificada' => '0.00','estado' => '15'));
    }
}
