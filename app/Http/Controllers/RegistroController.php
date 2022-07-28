<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function ListarEmbalses()
    {
    $lembalses = 1

        return view('registro.captacionEmbalses');
        // $lembalses = DB::table('fuente')
        // ->join('tipo_fuente','fuente.tipo','=','tipo_fuente.id')
        // ->join('estado','fuente.estado','=','estado.id')
        // ->join('municipio','fuente.municipio','=','municipio.id')
        // ->join('parroquias','fuente.parroquia','=','parroquias.id')
        // ->select('*')->get()->all();

        // // dd($lembalses);

        // return view('home.registro.captacionEmbalses',['embalses'=>$lembalses]);
    }

    public function aduccionEB()
    {
        // $nuevaeb = DB::table('eb_tipo')->get();

        // $acueducto = DB::table('acueducto')->get();

        // $estado = DB::table('estado')->get();

        // // dd($nuevaeb);
        // return view('registro.aduccionEB',['tipoeb'=>$nuevaeb, 'acueducto'=>$acueducto,'estado'=>$estado]);
        return view('registro.aduccionEB');
    }
    public function guardarEB()
    {
        dd($_POST);
    }

    public function ListarDiqueToma()
    {
      return view('registro.captacionDique');   
    }

    public function potabilizacionFiltracion()
    {

        // $acueducto = DB::table('acueducto')->get();

        // $estado = DB::table('estado')->get();

        // return view('potabilizacionFiltracion',['estado'=>$estado,'acueducto'=>$acueducto]);
       

        return view('registro.potabilizacionFiltracion');
    }

    public function guardarFiltracion()
    {
        dd($_POST);
    }

    public function potabilizacionDeszanilizadoras()
    { 
        return view('registro.potabilizacionDeszanilizadoras');
    }

    public function guardarDeszanilizadoras()
    {
        dd($_POST);
    }

    public function potabilizacionPotabilizadoras()
    {
        // $acueducto = DB::table('acueducto')->get();

        // $estado = DB::table('estado')->get();

        // return view('home.registro.potabilizacionPotabilizadoras',['estado'=>$estado,'acueducto'=>$acueducto]);
        return view('registro.potabilizacionPotabilizadoras');
    }

    public function guardarPotabilizadoras()
    {
        dd($_POST);
    }

    public function potabilizacionPortatiles()
    {
        // $acueducto = DB::table('acueducto')->get();

        // $estado = DB::table('estado')->get();

        // return view('home.registro.potabilizacionPortatiles',['estado'=>$estado,'acueducto'=>$acueducto]);   

      

        return view('registro.potabilizacionPortatiles');   
    }

    public function guardarPortatiles()
    {
        dd($_POST);
    }

}