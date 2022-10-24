<?php

namespace App\Http\Controllers;

use App\Models\EstacionBombeo;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Acueducto;
use App\Models\Sectores;
use App\Models\Sistema;
use App\Models\Infraestructura;
use App\Models\TipoProcesoHidrico;
use App\Models\TipoInfraestructura;
use App\Models\UbicacionGeografica;
use App\Models\TipoEstacionBombeo;
use App\Models\TipoServicioEstacionBombeo;
use Illuminate\Http\Request;

/**
 * Class EstacionBombeoController
 * @package App\Http\Controllers
 */
class EstacionBombeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionBombeos = EstacionBombeo::paginate();

        return view('estacion-bombeo.index', compact('estacionBombeos'))
            ->with('i', (request()->input('page', 1) - 1) * $estacionBombeos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estacionBombeo = new EstacionBombeo();
        $infraestructura = new Infraestructura();
        $ubicacionGeografica = new UbicacionGeografica();
        $estados = Estado::get()->all();
        $tipoin = TipoInfraestructura::get()->all();
        $sistemas = Sistema::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        $acueducto = Acueducto::get()->all();
        $tipoestacion = TipoEstacionBombeo::get()->all();
        $tiposervicio = TipoServicioEstacionBombeo::get()->all();

        return view('estacion-bombeo.create', compact('estacionBombeo', 'infraestructura', 'estados','ubicacionGeografica','tipoin','sistemas','acueducto', 'tipoestacion', 'tiposervicio','hidrico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $ubicacion = array(
            'id_estado' => $request->estado,
            'id_municipio' => $request->municipio,
            'id_parroquia' => $request->parroquia,
            'id_sector' => $request->sector,
            'desc_ubicacion' => $request->desc_ubicacion,
            'coordenadas_utm_a' => $request->coordenadas_utm_a,
            'coordenadas_utm_b' => $request->coordenadas_utm_b,
        );

        $guardarUbicacion = UbicacionGeografica::insert($ubicacion);

        $coordenadas = UbicacionGeografica::max('id');

        $infraestructura = array(
            'nombre_infraestructura' => $request->nombre_infraestructura,
            'propietario' => $request->propietario,
            'constructora' => $request->constructora,
            'proposito' => $request->proposito,
            'id_coordenadas' => $coordenadas,
            'poblacion_servida' => $request->poblacion_servida,
            'id_tipo_infraestructura' => $request->tipoInfraestructura,
            'id_tipo_proceso_hidrico' => $request->hidrico,
            'id_sistema' => $request->tipoSistema,
            'id_acueducto' => $request->acueducto,
        );

        $guardarInfraestructura = Infraestructura::insert($infraestructura);

        $idInfraestructura = Infraestructura::max('id');

        $EstacionBombeo = array (
            'nombre' => $request->nombre,
            'cantidad_grupos' => $request->cantidad_grupos,
            'id_tipo_estacion_bombeo' => $request->estacion,
            'id_tipo_servicio' => $request->servicio,
            'id_infraestructura' => $idInfraestructura,
        );

        $guardarEstacionBombeo = EstacionBombeo::insert($EstacionBombeo);

        // request()->validate(EstacionBombeo::$rules);

        // $estacionBombeo = EstacionBombeo::create($request->all());

        return redirect()->route('estacion-bombeos.index')
            ->with('success', 'EstacionBombeo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estacionBombeo = EstacionBombeo::join('infraestructura','estacion_bombeo.id_infraestructura','infraestructura.id')
        ->join('tipo_estacion_bombeo','estacion_bombeo.id_tipo_estacion_bombeo','tipo_estacion_bombeo.id')
        ->join('tipo_servicio_estacion_bombeo','estacion_bombeo.id_tipo_servicio','tipo_servicio_estacion_bombeo.id')
        ->join('ubicacion_geografica','infraestructura.id_coordenadas','ubicacion_geografica.id')
        ->join('estados','ubicacion_geografica.id_estado','estados.id')
        ->join('municipios','ubicacion_geografica.id_municipio','municipios.id')
        ->join('parroquias','ubicacion_geografica.id_parroquia','parroquias.id')
        ->join('sectores','ubicacion_geografica.id_sector','sectores.id')
        ->join('tipo_infraestructura','infraestructura.id_tipo_infraestructura','tipo_infraestructura.id')
        ->join('tipo_proceso_hidrico','infraestructura.id_tipo_proceso_hidrico','tipo_proceso_hidrico.id')
        ->join('sistemas','infraestructura.id_sistema','sistemas.id')
        ->join('acueductos','infraestructura.id_acueducto','acueductos.id')->find($id);

        return view('estacion-bombeo.show', compact('estacionBombeo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estacionBombeo = EstacionBombeo::find($id);
        $tipoestacion = TipoEstacionBombeo::get()->all();
        $tiposervicio = TipoServicioEstacionBombeo::get()->all();
        $infraestructura = Infraestructura::find($estacionBombeo->id_infraestructura);
        $ubicacionGeografica = UbicacionGeografica::find($infraestructura->id_coordenadas);
        $estados = Estado::get()->all();
        $municipios = Municipio::find($ubicacionGeografica->id_municipio);
        $parroquias = Parroquia::find($ubicacionGeografica->id_parroquia);
        $sectores = Sectores::find($ubicacionGeografica->id_sector);
        $tipoin = TipoInfraestructura::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        $sistemas = Sistema::get()->all();
        $acueducto = Acueducto::get()->all();


        return view('estacion-bombeo.edit', compact('estacionBombeo','infraestructura','ubicacionGeografica','estados','sectores','tipoin','hidrico','sistemas','acueducto','municipios','parroquias','tipoestacion','tiposervicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstacionBombeo $estacionBombeo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstacionBombeo $estacionBombeo)
    {

        $infraestructura = Infraestructura::find($estacionBombeo->id_infraestructura);
        $ubicacionGeografica = UbicacionGeografica::find($infraestructura->id_coordenadas);
        // dd($infraestructura, $ubicacionGeografica);

        $ubicacionUpdate = array(
            'id_estado' => $request->estado,
            'id_municipio' => $request->municipio,
            'id_parroquia' => $request->parroquia,
            'id_sector' => $request->sector,
            'desc_ubicacion' => $request->desc_ubicacion,
            'coordenadas_utm_a' => $request->coordenadas_utm_a,
            'coordenadas_utm_b' => $request->coordenadas_utm_b,
        );

        $guardarUbicacion = UbicacionGeografica::find($infraestructura->id_coordenadas)->update($ubicacionUpdate);

        // $coordenadas = UbicacionGeografica::max('id');

        $infraestructuraUpdate = array(
            'nombre_infraestructura' => $request->nombre_infraestructura,
            'propietario' => $request->propietario,
            'constructora' => $request->constructora,
            'proposito' => $request->proposito,
            'id_coordenadas' => $ubicacionGeografica->id,
            'poblacion_servida' => $request->poblacion_servida,
            'id_tipo_infraestructura' => $request->tipoInfraestructura,
            'id_tipo_proceso_hidrico' => $request->hidrico,
            'id_sistema' => $request->tipoSistema,
            'id_acueducto' => $request->acueducto,
        );

        $guardarInfraestructura = Infraestructura::find($estacionBombeo->id_infraestructura)->insert($infraestructuraUpdate);

        // $idInfraestructura = Infraestructura::max('id');

        $estacionBombeoUpdate = array (
            // 'reg' => $request->reg,
            'nombre' => $request->nombre,
            'id_tipo_estacion_bombeo' => $request->estacion,
            'id_tipo_servicio' => $request->servicio,
            // 'cronologia' => $request->cronologia,
            'id_infraestructura' => $infraestructura->id,
        );

        $guardarestacionBombeo = EstacionBombeo::find($estacionBombeo->id)->update($estacionBombeoUpdate);

        // request()->validate(EstacionBombeo::$rules);

        // $estacionBombeo->update($request->all());

        return redirect()->route('estacion_bombeo.index')
            ->with('success', 'EstacionBombeo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estacionBombeo = EstacionBombeo::find($id)->delete();

        return redirect()->route('estacion-bombeos.index')
            ->with('success', 'EstacionBombeo deleted successfully');
    }
}
