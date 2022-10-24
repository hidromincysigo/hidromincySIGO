<?php

namespace App\Http\Controllers;

use App\Models\Embalse;
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
use Illuminate\Http\Request;

/**
 * Class EmbalseController
 */
class EmbalseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:ver-embalses|crear-embalses|editar-embalses|borrar-embalses', ['only' => ['index']]);
        $this->middleware('permission:crear-embalses', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-embalses', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-embalses', ['only' => ['destroy']]);
    }

    public function index()
    {
        $embalses = Embalse::paginate();

        return view('embalse.index', compact('embalses'))
            ->with('i', (request()->input('page', 1) - 1) * $embalses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $embalse = new Embalse();
        $infraestructura = new Infraestructura();
        $ubicacionGeografica = new UbicacionGeografica();
        $estados = Estado::get()->all();
        $sectores = Sectores::get()->all();
        $tipoin = TipoInfraestructura::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        $sistemas = Sistema::get()->all();
        $acueducto = Acueducto::get()->all();
        return view('embalse.create',compact('embalse', 'infraestructura', 'estados','ubicacionGeografica','tipoin','sistemas','acueducto','hidrico'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

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

        $embalse = array (
            'reg' => $request->reg,
            'nombre' => $request->nombre,
            'cronologia' => $request->cronologia,
            'id_infraestructura' => $idInfraestructura,
        );

        $guardarEmbalse = Embalse::insert($embalse);

        // dd($request, $ubicacion, $infraestructura, $embalse, $guardarUbicacion, $guardarInfraestructura, $guardarEmbalse);
         // request()->validate(Embalse::$rules);

        // $embalse = Embalse::create($request->all());

        return redirect()->route('embalses.index')
            ->with('success', 'Embalse created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $embalse = Embalse::join('infraestructura','embalses.id_infraestructura','infraestructura.id')
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

        // dd($embalse);

        return view('embalse.show', compact('embalse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $embalse = Embalse::find($id);
        $infraestructura = Infraestructura::find($embalse->id_infraestructura);
        $ubicacionGeografica = UbicacionGeografica::find($infraestructura->id_coordenadas);
        $estados = Estado::get()->all();
        $municipios = Municipio::find($ubicacionGeografica->id_municipio);
        $parroquias = Parroquia::find($ubicacionGeografica->id_parroquia);
        $sectores = Sectores::find($ubicacionGeografica->id_sector);
        $tipoin = TipoInfraestructura::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        $sistemas = Sistema::get()->all();
        $acueducto = Acueducto::get()->all();

        return view('embalse.edit', compact('embalse', 'infraestructura','ubicacionGeografica','estados','sectores','tipoin','hidrico','sistemas','acueducto','municipios','parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Embalse  $embalse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Embalse $embalse)
    {   
        $infraestructura = Infraestructura::find($embalse->id_infraestructura);
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

        $guardarInfraestructura = Infraestructura::find($embalse->id_infraestructura)->insert($infraestructuraUpdate);

        // $idInfraestructura = Infraestructura::max('id');

        $embalseUpdate = array (
            'reg' => $request->reg,
            'nombre' => $request->nombre,
            'cronologia' => $request->cronologia,
            'id_infraestructura' => $infraestructura->id,
        );

        $guardarEmbalse = Embalse::find($embalse->id)->update($embalseUpdate);

        // request()->validate(Embalse::$rules);

        // $embalse->update($request->all());

        return redirect()->route('embalses.index')
            ->with('success', 'Embalse updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $embalse = Embalse::find($id)->delete();

        return redirect()->route('embalses.index')
            ->with('success', 'Embalse deleted successfully');
    }
}
