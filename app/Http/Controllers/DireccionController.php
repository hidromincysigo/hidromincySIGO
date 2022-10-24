<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Sectores;
use App\Models\Sistema;
use DB;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    public function llenarMunicipios(){
        DB::enableQueryLog();
        $id_estado = $_POST['id_estado'];
        $municipios = Municipio::where('estado_id',$id_estado)->orderBy('municipio','asc')->get();
        $q = DB::getQueryLog();
        // dd($q);
        return json_encode($municipios);
    }

    public function llenarParroquias(){
        $id_parroq = $_POST['id_municipio'];
        $parroquias = Parroquia::where('municipio_id',$id_parroq)->orderBy('parroquia','asc')->get();
        // dd($parroquias);
        return json_encode($parroquias);
    }
    public function llenarSector(){
        $id_parroq = $_POST['id_parroquia'];
        $sectores = Sectores::where('id_parroquia',$id_parroq)->orderBy('sector','asc')->get();
        // dd($parroquias);
        return json_encode($sectores);
    }
    public function tipoProceso()
    {
        $id_proceso = $_POST['id_proceso'];
        $sistema = Sistema::where('id_proceso',$id_proceso)->orderBy('sistemas','asc')->get();

        return json_encode($sistema);
    }

}
