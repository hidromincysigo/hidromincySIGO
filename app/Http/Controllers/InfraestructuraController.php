<?php

namespace App\Http\Controllers;

use App\Models\Infraestructura;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Sectores;
use App\Models\Acueducto;
use App\Models\Sistema;
use App\Models\Fabricante;
use App\Models\UbicacionGeografica;
use App\Models\ProcesoHidrico;
use App\Models\TipoProcesoHidrico;
use App\Models\Bomba;
use App\Models\Manifold;
use App\Models\TipoManifold;
use App\Models\Motores;
use App\Models\TipoArranque;
use App\Models\TipoInterruptor;
use App\Models\Tableros;
use App\Models\TipoTensionTablero;
use App\Models\Tuberias;
use App\Models\TipoMaterial;
use App\Models\TipoTuberia;
use App\Models\Valvula;
use App\Models\TipoValvula;
use SweetAlert2;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class InfraestructuraController
 * @package App\Http\Controllers
 */
class InfraestructuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infraestructuras = Infraestructura::join('ubicacion_geografica','infraestructura.id_coordenadas','ubicacion_geografica.id')
        ->join('estados','ubicacion_geografica.id_estado','estados.id')
        ->join('municipios','ubicacion_geografica.id_municipio','municipios.id')
        ->join('parroquias','ubicacion_geografica.id_parroquia','parroquias.id')
        ->join('sectores','ubicacion_geografica.id_sector','sectores.id')
        ->join('acueductos','infraestructura.id_acueducto','acueductos.id')
        ->join('sistemas','infraestructura.id_sistema','sistemas.id')
        ->join('proceso_hidrico','infraestructura.id_proceso','proceso_hidrico.id')
        ->select('infraestructura.id','ubicacion_geografica.coordenadas_utm_a','ubicacion_geografica.coordenadas_utm_b','estados.estado','municipios.municipio','parroquias.parroquia','sectores.sector','infraestructura.nombre_infraestructura','acueductos.nombre_acueducto','sistemas.sistemas','proceso_hidrico.descripcion_proceso')
        ->paginate();

        return view('edificacion.index', compact('infraestructuras'))
        ->with('i', (request()->input('page', 1) - 1) * $infraestructuras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infraestructura = new Infraestructura();
        $ubicacionGeografica = new UbicacionGeografica();
        $fabricante = new Fabricante();
        $estados = Estado::get()->all();
        $sectores = Sectores::get()->all();
        $tipoin = ProcesoHidrico::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        // $sistemas = Sistema::get()->all();
        $acueducto = Acueducto::get()->all();

        // dd($municipios);

        return view('edificacion.create', compact('infraestructura', 'estados','ubicacionGeografica','tipoin','acueducto','hidrico','fabricante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'nombre_infraestructura' => 'unique:infraestructura',
            'serial' => 'unique:fabricante',
        ]);

        $ubicacion = array(
            'id_estado' => $request->estado,
            'id_municipio' => $request->municipio,
            'id_parroquia' => $request->parroquia,
            'id_sector' => $request->sector,
            'coordenadas_utm_a' => $request->coordenadas_utm_a,
            'coordenadas_utm_b' => $request->coordenadas_utm_b,
        );

        $guardarUbicacion = UbicacionGeografica::insert($ubicacion);
        $coordenadas = UbicacionGeografica::max('id');

        // $fabricante = array(
        //     'nombre_fabricante' => $request->nombre_fabricante,
        //     'modelo' => $request->modelo,
        //     'serial' => $request->serial,
        //     'origen' => $request->origen,
        // );

        // $guardarFabricante = Fabricante::insert($fabricante);
        // $idFabricante = Fabricante::max('id');

        $infraestructura = array(
            'nombre_infraestructura' => $request->nombre_infraestructura,
            'id_coordenadas' => $coordenadas,
            'id_proceso' => $request->procesoHidrico,
            // 'id_tipo_proceso_hidrico' => $request->hidrico,
            'id_sistema' => $request->tipoSistema,
            'id_acueducto' => $request->acueducto,
            'id_fabricante' => $idFabricante,
        );

        $guardarInfraestructura = Infraestructura::insert($infraestructura);

        // request()->validate(Infraestructura::$rules);

        // $infraestructura = Infraestructura::create($request->all());

        return redirect()->route('edificacion.index')
        ->with('success', 'Infraestructura creada con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infraestructura = Infraestructura::find($id);
        $ubicacionGeografica = UbicacionGeografica::find($infraestructura->id_coordenadas);
        $fabricante = Fabricante::find($infraestructura->id_fabricante);
        $estados = Estado::find($ubicacionGeografica->id_estado);
        $sectores = Sectores::find($ubicacionGeografica->id_sector);
        $municipios = Municipio::find($ubicacionGeografica->id_municipio);
        $parroquias = Parroquia::find($ubicacionGeografica->id_parroquia);
        $tipoin = ProcesoHidrico::where('id',$infraestructura->id_proceso)->get()->first();
        $sistemas = Sistema::where('id',$infraestructura->id_sistema)->get()->first();
        $acueducto = Acueducto::find($infraestructura->id_acueducto);
        $hidrico = TipoProcesoHidrico::where('id',$infraestructura->id_sistema)->get()->first();
        $bomba = Bomba::where('id_infraestructura',$id)->get()->all();
        // dd($bomba);
        $manifold = Manifold::join('tipo_manifold','manifold.id_tipo_manifold','tipo_manifold.id')->where('manifold.id_infraestructura',$infraestructura->id)->get()->all();

        // dd($manifold);
        // $tipoManifold = TipoManifold::where('id',$manifold->id_tipo_manifold)->get()->all();
        $motores = Motores::join('tipo_arranque','motores.id_tipo_arranque','tipo_arranque.id')->join('tipo_interruptor','motores.id_tipo_interruptor','tipo_interruptor.id')->where('id_infraestructura',$infraestructura->id)->get()->all();
        // $arranque = TipoArranque::where('id',$motores->id_tipo_arranque)->get()->first();
        // $interruptor = TipoInterruptor::where('id',$motores->id_tipo_interruptor)->get()->first();
        $tablero = Tableros::join('tipo_tension_tablero','tableros.id_tipo_tension','tipo_tension_tablero.id')->where('id_infraestructura',$infraestructura->id)->get()->all();
        // $tipoTension  = TipoTensionTablero::where('id',$tablero->id_tipo_tension)->get()->first();
        $tuberia = Tuberias::join('tipo_material','tuberias.id_tipo_material','tipo_material.id')->join('tipo_tuberia','tuberias.id_tipo_tuberia','tipo_tuberia.id')->where('id_infraestructura',$infraestructura->id)->get()->all();
        // $material = TipoMaterial::where('id',$tuberia->id_tipo_material)->get()->first();
        // $tipoTuberia = TipoTuberia::where('id',$tuberia->id_tipo_tuberia)->get()->first();
        $valvula = Valvula::join('tipo_valvulas','valvulas.id_tipo_valvula','tipo_valvulas.id')->where('id_infraestructura',$infraestructura->id)->get()->all();
        // $tipoValvula = TipoValvula::where('id',$valvula->id_tipo_valvula)->get()->first();

        // dd($infraestructura,$estados,$ubicacionGeografica,$tipoin,$acueducto,$fabricante,$bomba,$manifold,$tipoManifold,$motores,$arranque,$interruptor,$tablero,$tipoTension,$tuberia,$material,$tipoTuberia,$valvula,$tipoValvula);
                // 'bomba','manifold','tipoManifold','motores','arranque','interruptor','tablero','tipoTension','tuberia','material','tipoTuberia','valvula','tipoValvula'
        
        return view('edificacion.show', compact('infraestructura', 'estados','municipios','parroquias','sectores','ubicacionGeografica','tipoin','acueducto','hidrico','fabricante','bomba','manifold','motores','tablero','tuberia','valvula','sistemas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infraestructura = Infraestructura::find($id);
        $fabricante = Fabricante::find($infraestructura->id_fabricante);
        $estados = Estado::get()->all();
        $ubicacionGeografica = UbicacionGeografica::find($infraestructura->id_coordenadas);
        $estados = Estado::get()->all();
        $municipios = Municipio::find($ubicacionGeografica->id_municipio);
        $parroquias = Parroquia::find($ubicacionGeografica->id_parroquia);
        $sectores = Sectores::find($ubicacionGeografica->id_sector);
        $tipoin = ProcesoHidrico::get()->all();
        $hidrico = TipoProcesoHidrico::get()->all();
        $sistemas = Sistema::where('id',$infraestructura->id_sistema)->get()->first();
        // dd($sistemas);
        $acueducto = Acueducto::get()->all();

        return view('edificacion.edit', compact('infraestructura', 'estados','municipios','parroquias','sectores','ubicacionGeografica','tipoin','sistemas','acueducto','hidrico','fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Infraestructura $infraestructura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infraestructura $infraestructura)
    {
        $actualizarUbicacion = array(
            'id_estado' => $request->estado,
            'id_municipio' => $request->municipio,
            'id_parroquia' => $request->parroquia,
            'id_sector' => $request->sector,
            'coordenadas_utm_a' => $request->coordenadas_utm_a,
            'coordenadas_utm_b' => $request->coordenadas_utm_b,
        );

        $guardarUbicacion = UbicacionGeografica::where('id',$infraestructura->id_coordenadas)->update($actualizarUbicacion);
        // $coordenadas = UbicacionGeografica::max('id');

        $actualizarFabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
        );

        $guardarFabricante = Fabricante::where('id',$infraestructura->id_fabricante)->update($actualizarFabricante);
        // $idFabricante = Fabricante::max('id');

        $actualizarInfraestructura = array(
            'nombre_infraestructura' => $request->nombre_infraestructura,
            'id_coordenadas' => $infraestructura->id_coordenadas,
            'id_proceso' => $request->procesoHidrico,
            // 'id_tipo_proceso_hidrico' => $request->hidrico,
            'id_sistema' => $request->tipoSistema,
            'id_acueducto' => $request->acueducto,
            'id_fabricante' => $infraestructura->id_fabricante,
        );

        $guardarInfraestructura = Infraestructura::where('id',$infraestructura->id)->update($actualizarInfraestructura);

        // request()->validate(Infraestructura::$rules);
        // dd($actualizarUbicacion, $actualizarFabricante, $actualizarInfraestructura,$guardarUbicacion,$guardarFabricante,$guardarInfraestructura);
        // $infraestructura->update($request->all());

        return redirect()->route('edificacion.index')
        ->with('success', 'Infraestructura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $infraestructura = Infraestructura::find($id)->delete();

        return redirect()->route('edificacion.index')
        ->with('success', 'Infraestructura deleted successfully');
    }
}