<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Embalse;

class EmbalseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Embalse::create(array('id' => '3','reg' => '20210222021610','nombre' => 'EMBALSE LAGARTIJO','estado' => '15','municipio' => '194','parroquia' => '17','desc_ubicacion' => 'SOBRE EL RIO LAGARTIJO, A 4 KM. DE FRANCISCO DE YARE ','utm_a' => '112988,7','utm_b' => '748966,9','proposito' => 'ABASTECIMIENTO DE AGUA POTABLE PARA LA CIDAD DE CARACAS','propietario' => 'MINAGUAS','constructora' => 'VELUTINI & BERGAMIN','cronologia' => '1960-62'));
        Embalse::create(array('id' => '5','reg' => '20210222035651','nombre' => 'EMBALSE CAMATAGUA','estado' => '4','municipio' => '37','parroquia' => '16','desc_ubicacion' => 'PUEBLO CAMATAGUA, MANO DERECHA HOSPITAL CAMATAGUA','utm_a' => '1086783,3','utm_b' => '720080,6','proposito' => 'ABASTECIMIENTO DE AGUA POTABLE PARA LA CIDAD DE CARACAS','propietario' => 'MINAGUAS HIDROCAPITAL','constructora' => 'ESCAVADORA CA','cronologia' => '1963-68'));
        Embalse::create(array('id' => '6','reg' => '20210222042552','nombre' => 'EMBALSE QUEBRADA SECA','estado' => '15','municipio' => '194','parroquia' => '17','desc_ubicacion' => 'VIA CARRETERA NACIONAL YARE, CRUZE AL HOTEL EL REFUGIO, SECTOR QUEBRADA SECA','utm_a' => '1129373,1','utm_b' => '747464,8','proposito' => 'ABASTECIMIENTO','propietario' => 'MINAGUAS HIDROCAPITAL','constructora' => 'VELUTINI & BERGAMIN','cronologia' => '1960-61'));
        Embalse::create(array('id' => '7','reg' => '20210222044638','nombre' => 'AGUA FRIA','estado' => '15','municipio' => '186','parroquia' => '2','desc_ubicacion' => 'SECTOR EL JARILLO ','utm_a' => '1150842,2','utm_b' => '727170,8','proposito' => 'ABASTECIMIENTO','propietario' => 'MINAGUAS HIDROCAPITAL','constructora' => 'DIQUES Y CANALES CA','cronologia' => '1946-49'));
        Embalse::create(array('id' => '8','reg' => '20210222045524','nombre' => 'EMBALSE EL GUAPO','estado' => '15','municipio' => '192','parroquia' => '19','desc_ubicacion' => 'SUR DE EL GUAPO','utm_a' => '1122321,7','utm_b' => '722223,8','proposito' => 'ABASTECIMIENTO','propietario' => 'MINAGUAS HIDROCAPITAL','constructora' => 'SPILIMERGSA','cronologia' => '1975-77'));
        Embalse::create(array('id' => '9','reg' => '20210222050439','nombre' => 'EMBALSE LA PEREZA','estado' => '15','municipio' => '195','parroquia' => '20','desc_ubicacion' => 'ANTIGUO LICEO MILITAR FRANCISCO DE MIRANDA, ANTUALMENTE ESCUELA LATINOAMERICANA DE MEDICINA SALVADOR ALLENDE','utm_a' => '1150842,2','utm_b' => '727170,8','proposito' => 'ABASTECIMIENTO','propietario' => 'MINAGUAS HIDROCAPITAL','constructora' => 'ENECA S.A','cronologia' => '1966-69'));
        Embalse::create(array('id' => '10','reg' => '20210222052314','nombre' => 'EMBALSE OCUMARITO','estado' => '15','municipio' => '188','parroquia' => '21','desc_ubicacion' => 'SECTOR LA CABALLERISA VIA CAISITA','utm_a' => '1117343,8','utm_b' => '741304,8','proposito' => 'ABASTECIMIENTO','propietario' => 'MINAGUAS HIDROCAPITAL','constructora' => 'CONSORCIO SANTA CLARA SACAIM - SMERALDI','cronologia' => '1967-69'));
    }
}
