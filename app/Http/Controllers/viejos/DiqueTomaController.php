<?php

namespace App\Http\Controllers;

use App\Models\DiqueToma;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Sectores;
use App\Models\Acueducto;
use App\Models\Sistema;
use App\Models\Infraestructura;
use App\Models\TipoInfraestructura;
use App\Models\TipoProcesoHidrico;
use App\Models\UbicacionGeografica;
use DB;
use Illuminate\Http\Request;

/**
 * Class DiqueTomaController
 */
class DiqueTomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:ver-diquetoma|crear-diquetoma|editar-diquetoma|borrar-diquetoma', ['only' => ['index']]);
        $this->middleware('permission:crear-diquetoma', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-diquetoma', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-diquetoma', ['only' => ['destroy']]);
    }

    public function index()
    {
        $diqueTomas = DiqueToma::paginate();

        return view('dique-toma.index', compact('diqueTomas'))
            ->with('i', (request()->input('page', 1) - 1) * $diqueTomas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diqueToma = new DiqueToma();
        $infraestructura = new Infraestructura();
        $ubicacionGeografica = new UbicacionGeografica();
        $estados = Estado::get()->all();
        $sectores = Sectores::get()->all();
        $tipoin = TipoInfraestructura::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        $sistemas = Sistema::get()->all();
        $acueducto = Acueducto::get()->all();

        return view('dique-toma.create',compact('diqueToma', 'infraestructura', 'estados','ubicacionGeografica','tipoin','sistemas','acueducto','hidrico'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

        $DiqueToma = array (
            'reg' => $request->reg,
            'nombre' => $request->nombre,
            'toma_rio' => $request->toma_rio,
            'caudal_diseno' => $request->caudal_diseno,
            'caudal_recibe' => $request->caudal_recibe,
            'status' => $request->status,
            'id_infraestructura' => $idInfraestructura,
        );

        $guardarDiqueToma = DiqueToma::insert($DiqueToma);

        // request()->validate(DiqueToma::$rules);

        // $diqueToma = DiqueToma::create($request->all());

        return redirect()->route('dique-toma.index')
            ->with('success', 'DiqueToma created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diqueToma = DiqueToma::join('infraestructura','dique_toma.id_infraestructura','infraestructura.id')
        ->join('ubicacion_geografica','infraestructura.id_coordenadas','ubicacion_geografica.id')
        ->join('estados','ubicacion_geografica.id_estado','estados.id')
        ->join('municipios','ubicacion_geografica.id_municipio','municipios.id')
        ->join('parroquias','ubicacion_geografica.id_parroquia','parroquias.id')
        ->join('sectores','ubicacion_geografica.id_sector','sectores.id')
        ->join('tipo_infraestructura','infraestructura.id_tipo_infraestructura','tipo_infraestructura.id')
        ->join('tipo_proceso_hidrico','infraestructura.id_tipo_proceso_hidrico','tipo_proceso_hidrico.id')
        ->join('sistemas','infraestructura.id_sistema','sistemas.id')
        ->join('acueductos','infraestructura.id_acueducto','acueductos.id')
        ->find($id);

        return view('dique-toma.show', compact('diqueToma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $diqueToma = DiqueToma::find($id);
        $infraestructura = Infraestructura::find($diqueToma->id_infraestructura);
        $ubicacionGeografica = UbicacionGeografica::find($infraestructura->id_coordenadas);
        $estados = Estado::get()->all();
        $municipios = Municipio::find($ubicacionGeografica->id_municipio);
        $parroquias = Parroquia::find($ubicacionGeografica->id_parroquia);
        $sectores = Sectores::find($ubicacionGeografica->id_sector);
        $tipoin = TipoInfraestructura::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        $sistemas = Sistema::get()->all();
        $acueducto = Acueducto::get()->all();


        return view('dique-toma.edit', compact('diqueToma', 'infraestructura','ubicacionGeografica','estados','sectores','tipoin','hidrico','sistemas','acueducto','municipios','parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  DiqueToma  $diqueToma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiqueToma $diqueToma)
    {

        $infraestructura = Infraestructura::find($diqueToma->id_infraestructura);
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

        $guardarInfraestructura = Infraestructura::find($diqueToma->id_infraestructura)->insert($infraestructuraUpdate);

        // $idInfraestructura = Infraestructura::max('id');

        $diqueTomaUpdate = array (
            'reg' => $request->reg,
            'nombre' => $request->nombre,
            'cronologia' => $request->cronologia,
            'id_infraestructura' => $infraestructura->id,
        );

        $guardarDiqueToma = DiqueToma::find($diqueToma->id)->update($diqueTomaUpdate);

        // request()->validate(DiqueToma::$rules);

        // $diqueToma->update($request->all());

        return redirect()->route('dique_toma.index')
            ->with('success', 'DiqueToma updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $diqueToma = DiqueToma::find($id)->delete();

        return redirect()->route('dique-toma.index')
            ->with('success', 'DiqueToma deleted successfully');
    }
}
