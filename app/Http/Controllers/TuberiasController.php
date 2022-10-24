<?php

namespace App\Http\Controllers;

use App\Models\Tuberias;
use App\Models\TipoMaterial;
use App\Models\TipoTuberia;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
use App\Models\Manifold;
use App\Models\TipoManifold;
use App\Models\Operatividad;
use App\Models\Infraestructura;

use Illuminate\Http\Request;

/**
 * Class TuberiaController
 * @package App\Http\Controllers
 */
class TuberiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuberias = Tuberias::join('tipo_material','tuberias.id_tipo_material','tipo_material.id')
        ->join('tipo_tuberia','tuberias.id_tipo_tuberia','tipo_tuberia.id')
        ->join('manifold','tuberias.id_manifold','manifold.id')
        ->join('tipo_manifold','manifold.id_tipo_manifold','tipo_manifold.id')
        ->join('infraestructura','tuberias.id_infraestructura','infraestructura.id')
        ->join('operatividad','tuberias.operatividad','operatividad.id')
        ->select('tuberias.id',
        'tuberias.diametro',
        'tuberias.norma',
        'tuberias.grado',
        'tuberias.espesor',
        'tuberias.longitud',
        'tuberias.sdr',
        'tuberias.pn',
        'tuberias.rde',
        'operatividad.operatividad',
        'tuberias.en_uso',
        'tuberias.deleted_at',
        'tuberias.created_at',
        'tuberias.updated_at',
        'tipo_material.tipo_material',
        'tipo_tuberia.tipo_tuberia',
        'manifold.nombre_manifold',
        // 'cant_bridas',
        // 'cant_monometro',
        // 'cant_valvulas',
        // 'cant_tuberias',
        'tipo_manifold.tipo_manifold',
        'infraestructura.nombre_infraestructura',)
        ->paginate();
        // dd($tuberias);
    


        return view('tuberias.index', compact('tuberias'))
            ->with('i', (request()->input('page', 1) - 1) * $tuberias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tuberia = new Tuberias();
        $fabricante = new Fabricante();
        $manifold = Manifold::get()->all();
        $material = TipoMaterial::get()->all();
        $tipo = TipoTuberia::get()->all();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $operatividad = Operatividad::get()->all();

        // dd($estacion, $fabricante, $material, $tipo, $manifold);

        return view('tuberias.create', compact('tuberia','tipo', 'estacion', 'fabricante', 'material', 'manifold','operatividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
    $fabricante = array(
    'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );

    $guardarFabricante = Fabricante::insert($fabricante);
    $idFabricante = Fabricante::max('id');

    $tuberia = array(
    'diametro' => $request->diametro,
    'norma' => $request->norma,
    'grado' => $request->grado,
    'espesor' => $request->espesor,
    'longitud' => $request->longitud,
    'sdr' => $request->sdr,
    'pn' => $request->pn,
    'rde' => $request->rde,
    'operatividad' => $request->operatividad,
    'id_fabricante' => $idFabricante,
    'id_tipo_tuberia' => $request->tuberia,
    'id_tipo_material' => $request->material,
    'id_manifold' => $request->manifold,
    'id_infraestructura' => $request->estacion,
    'en_uso' => $request->en_uso,
    );

    $guardarTuberia = Tuberias::insert($tuberia);

        // request()->validate(Tuberias::$rules);

        // $tuberia = Tuberias::create($request->all());

        return redirect()->route('tuberias.index')
            ->with('success', 'Tuberia creada con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tuberia = Tuberias::join('tipo_material','tuberias.id_tipo_material','tipo_material.id')
        ->join('tipo_tuberia','tuberias.id_tipo_tuberia','tipo_tuberia.id')
        ->join('manifold','tuberias.id_manifold','manifold.id')
        ->join('tipo_manifold','manifold.id_tipo_manifold','tipo_manifold.id')
        ->join('infraestructura','tuberias.id_infraestructura','infraestructura.id')
        ->join('operatividad','tuberias.operatividad','operatividad.id')
        ->select('tuberias.id',
        'tuberias.diametro',
        'tuberias.norma',
        'tuberias.grado',
        'tuberias.espesor',
        'tuberias.longitud',
        'tuberias.sdr',
        'tuberias.pn',
        'tuberias.rde',
        'operatividad.operatividad',
        'tuberias.en_uso',
        'tuberias.deleted_at',
        'tuberias.created_at',
        'tuberias.updated_at',
        'tipo_material.tipo_material',
        'tipo_tuberia.tipo_tuberia',
        'manifold.nombre_manifold',
        // 'cant_bridas',
        // 'cant_monometro',
        // 'cant_valvulas',
        // 'cant_tuberias',
        'tipo_manifold.tipo_manifold',
        'infraestructura.nombre_infraestructura',)
        ->find($id);

        return view('tuberias.show', compact('tuberia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tuberia = Tuberias::find($id);
        $material = TipoMaterial::get()->all();
        $tipo = TipoTuberia::get()->all();
        $fabricante = Fabricante::find($tuberia->id_fabricante);
        $manifold = Manifold::get()->all();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $operatividad = Operatividad::get()->all();

        return view('tuberias.edit', compact('tuberia','tipo', 'estacion', 'fabricante', 'material', 'manifold','operatividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tuberia $tuberia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuberias $tuberia)
    {
        // dd($tuberia);die;
    $actualuzarTuberia = array(
    'diametro' => $request->diametro,
    'norma' => $request->norma,
    'grado' => $request->grado,
    'espesor' => $request->espesor,
    'longitud' => $request->longitud,
    'sdr' => $request->sdr,
    'pn' => $request->pn,
    'rde' => $request->rde,
    'operatividad' => $request->operatividad,
    'id_fabricante' => $tuberia->id_fabricante,
    'id_tipo_tuberia' => $request->tuberia,
    'id_tipo_material' => $request->material,
    'id_manifold' => $request->manifold,
    'id_infraestructura' => $request->estacion,
    'en_uso' => $request->en_uso,
    );

    $guardarTuberia = Tuberias::where('id',$tuberia->id)->update($actualuzarTuberia);

        $fabricante = array(
    'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );

    $guardarFabricante = Fabricante::where('id',$tuberia->id_fabricante)->update($fabricante);
        return redirect()->route('tuberias.index')
            ->with('success', 'Tuberia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tuberia = Tuberias::find($id)->delete();

        return redirect()->route('tuberias.index')
            ->with('success', 'Tuberia deleted successfully');
    }
}
