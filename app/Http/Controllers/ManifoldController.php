<?php

namespace App\Http\Controllers;

use App\Models\Manifold;
use App\Models\TipoManifold;
use App\Models\EstacionBombeo;
use App\Models\Infraestructura;
use App\Models\Fabricante;
use App\Models\Operatividad;
use Illuminate\Http\Request;

/**
 * Class ManifoldController
 * @package App\Http\Controllers
 */
class ManifoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manifolds = Manifold::join('operatividad','manifold.operatividad','operatividad.id')
        ->join('tipo_manifold','manifold.id_tipo_manifold','tipo_manifold.id')
        ->join('infraestructura','manifold.id_infraestructura','infraestructura.id')->select('manifold.id',
        'manifold.nombre_manifold',
        'manifold.cant_bridas',
        'manifold.cant_monometro',
        'manifold.cant_valvulas',
        'manifold.cant_tuberias',
        'operatividad.operatividad',
        'tipo_manifold',
        'nombre_infraestructura',
        'manifold.created_at',
        'manifold.updated_at',
        'manifold.deleted_at')->paginate();
        // dd($manifolds);

        return view('manifold.index', compact('manifolds'))
            ->with('i', (request()->input('page', 1) - 1) * $manifolds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manifold = new Manifold();
        $fabricante = new Fabricante();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $tipo = TipoManifold::get()->all();
        $operatividad = Operatividad::get()->all();

        return view('manifold.create', compact('manifold', 'estacion', 'tipo','operatividad','fabricante'));
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
            'serial' => 'unique:fabricante',
        ]);

        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
        );

        $guardarFabricante = Fabricante::insert($fabricante);
        $idFabricante = Fabricante::max('id');

        $manifoldDatos = array (
            'nombre_manifold' => $request->nombre_manifold,
            'id_tipo_manifold' => $request->tipo,
            'cant_bridas' => $request->cant_bridas,
            'cant_monometro' => $request->cant_monometro,
            'cant_valvulas'   =>  $request->cant_valvulas,
            'cant_tuberias'   =>  $request->cant_tuberias,
            'operatividad' => $request->operatividad,
            'id_infraestructura'  =>  $request->estacion,
            'id_fabricante' => $idFabricante,
        );
        $manifold = Manifold::insert($manifoldDatos);

        // request()->validate(Manifold::$rules);

        // $manifold = Manifold::create($request->all());

        return redirect()->route('manifold.index')
            ->with('success', 'Manifold creado con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manifold = Manifold::join('operatividad','manifold.operatividad','operatividad.id')
        ->join('tipo_manifold','manifold.id_tipo_manifold','tipo_manifold.id')
        ->join('infraestructura','manifold.id_infraestructura','infraestructura.id')->where('manifold.id',$id)->select('*')->get()->first();   
        // dd($manifold);
        return view('manifold.show', compact('manifold'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Manifold $manifold)
    {
        // dd($manifold);
        $fabricante = Fabricante::find($manifold->id_fabricante);
        $manifold = Manifold::find($manifold->id);
        $tipo = TipoManifold::get()->all();
        $estacion = EstacionBombeo::get()->all();
        $operatividad = Operatividad::get()->all();

        return view('manifold.edit', compact('manifold','tipo','estacion','operatividad','fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Manifold $manifold
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manifold $manifold)
    {
        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
        );

        $guardarFabricante = Fabricante::find($manifold->id_fabricante)->update($fabricante);

        $manifoldNuevo = array (
            'nombre_manifold' => $request->nombre_manifold,
            'id_tipo_manifold' => $request->tipo,
            'cant_bridas' => $request->cant_bridas,
            'cant_monometro' => $request->cant_monometro,
            'cant_valvulas'   =>  $request->cant_valvulas,
            'cant_tuberias'   =>  $request->cant_tuberias,
            'operatividad' => $request->operatividad,
            'id_infraestructura'  =>  $request->estacion,
            'id_fabricante' => $manifold->id_fabricante,
        );

        $manifoldUpdate = Manifold::find($manifold->id)->update($manifoldNuevo); 
        
        // request()->validate(Manifold::$rules);

        // $manifold->update($request->all());

        return redirect()->route('manifold.index')
            ->with('success', 'Manifold updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $manifold = Manifold::find($id)->delete();

        return redirect()->route('manifold.index')
            ->with('success', 'Manifold deleted successfully');
    }
}
