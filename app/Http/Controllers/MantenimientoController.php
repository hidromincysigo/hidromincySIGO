<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Equipo;
use App\Models\TipoEquipo;
use App\Models\TipoManifold;
use App\Models\TipoArranque;
use App\Models\TipoInterruptor;
use App\Models\TipoMotor;
use App\Models\TipoTensionTablero;
use App\Models\TipoMaterial;
use App\Models\TipoTuberia;
use App\Models\TipoAccionamientoValvula;
use App\Models\TipoValvula;
use App\Models\Bomba;
use App\Models\Manifold;
use App\Models\Motores;
use App\Models\Tableros;
use App\Models\Tuberias;
use App\Models\Valvula;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infraestructura = 
        return view('mantenimiento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosTuberia = DB::table('datos_tuberia')->get();
        $tipoRed = DB::table('tipo_red')->get();
        $elementoFalla = DB::table('elemento_falla')->get();
        $causaPosible = DB::table('causa_posible')->get();
        $estatuAveria = DB::table('estatus')->get();
        $sino = DB::table('sino')->get();

        return view('mantenimiento.create',[
            'datosTuberia'  => $datosTuberia,
            'tipoRed'       => $tipoRed,
            'elementoFalla' => $elementoFalla,
            'causaPosible'  => $causaPosible, 
            'estatuAveria'  => $estatuAveria,
            // 'id_reporte'    => $id_reporte,
            // 'reporte'       => $reporte,
            'sino'          => $sino,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);die;
    //     $id_seguimiento = intval(date("ymd").random_int(0000, 9999));

    //     $hueco = $_POST['hueco'];
    //     $codHueco = 46;

    //     if ($hueco === 'si'){
    //         $id_seguimiento = intval(date("ymd").random_int(00, 99));
    //         $id_seguimiento = $id_seguimiento.$codHueco;

    //     }

    //     $seguimientos = array(
    //         'id_seguimiento'        => $id_seguimiento,
    //         'id_estatu'             => intval($_POST['estadoAveria']),
    //         'cod_reporte'           => intval($_POST['codReporte']),
    //         'diametro'              => intval($_POST['diametro']),
    //         'profundidad'           => intval($_POST['profundidad']),
    //         'largo'                 => intval($_POST['largo']),
    //         'ancho'                 => intval($_POST['ancho']),
    //         'profundidad_hueco'     => intval($_POST['profundidadHueco']),
    //         'cuadrilla'             => $_POST['cuadrilla'],
    //         'ubicacion'             => $_POST['ubicacion'],
    //         'cod_material_tuberia'  => $_POST['datosTuberia'],
    //         'cod_tipo_red'          => $_POST['tipoRed'],
    //         'cod_elemento_falla'    => $_POST['elementoFalla'],
    //         'cod_causa_posible'     => $_POST['causaPosible'],
    //         'fecha_inicio'          => $_POST['fecha_ini'],
    //         'fecha_fin'             => $_POST['fecha_fin'],
    //         'descarga'              => $_POST['descarga'],
    //         'sino'                  => $_POST['hueco'],
    //         'actividades_realizadas'=> trim($_POST['actividadesRealizadas']),
    //     );

    //     $insertSeguimiento = DB::table('seguimiento')->insert($seguimientos);
    //     $query = DB::getQueryLog();

    //     foreach ($_POST['cantidad'] as $i => $value) {
    //         $materialesSeguimiento[$i]['id_seguimiento'] = $id_seguimiento;
    //         $materialesSeguimiento[$i]['cantidad'] = $value;
    //     }

    //     foreach ($_POST['descripcion'] as $i => $value) {
    //         $materialesSeguimiento[$i]['id_seguimiento'] = $id_seguimiento;
    //         $materialesSeguimiento[$i]['material'] = strval($value);
    //     }

    //     foreach ($_POST['ordenNum'] as $i => $value) {
    //         $materialesSeguimiento[$i]['id_seguimiento'] = $id_seguimiento;
    //         $materialesSeguimiento[$i]['orden_almacen'] = $value;
    //     }

    //     $insertMatSeg = DB::table('seguimiento_materiales')->insert($materialesSeguimiento);

    //     return view('mantenimiento.index')->with('message','Seguimiento guardado exitosamente');
    // }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
