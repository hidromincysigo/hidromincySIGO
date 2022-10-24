<?php

namespace App\Http\Controllers;

use App\Models\Tableros;
use App\Models\TipoTensionTablero;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
use App\Models\Infraestructura;
use App\Models\Operatividad;
use Illuminate\Http\Request;

/**
 * Class TableroController
 * @package App\Http\Controllers
 */
class TablerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableros = Tableros::join('tipo_tension_tablero','tableros.id_tipo_tension','tipo_tension_tablero.id')->join('infraestructura','tableros.id_infraestructura','infraestructura.id')->join('operatividad','tableros.operatividad','operatividad.id')
        ->select(
            'tableros.id',
            'tableros.ancho',
            'tableros.alto',
            'tableros.profundidad',
            'tableros.aislante',
            'tableros.capacidad',
            'operatividad.operatividad',
            'tableros.en_uso',
            'tableros.grupo',
            'tipo_tension_tablero.tipo_tension_tablero',
            'infraestructura.nombre_infraestructura',
            'tableros.deleted_at',
            'tableros.created_at',
            'tableros.updated_at',
        )->paginate();
        // dd($tableros);
        return view('tableros.index', compact('tableros'))
        ->with('i', (request()->input('page', 1) - 1) * $tableros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tablero = new Tableros();
        $fabricante = new Fabricante();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $tipo = TipoTensionTablero::get()->all();
        $operatividad = Operatividad::get()->all();

        return view('tableros.create', compact('tablero', 'tipo', 'estacion', 'fabricante','operatividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );

        $guardarFabricante = Fabricante::insert($fabricante);
        $idFabricante = Fabricante::max('id');

        $tablero = array(
            'ancho'  =>  $request->ancho,
            'alto'  =>  $request->alto,
            'profundidad'  =>  $request->profundidad,
            'aislante'  =>  $request->aislante,
            'capacidad'  =>  $request->capacidad,
            'id_infraestructura'  =>  $request->estacion,
            'id_tipo_tension'   =>  $request->tension,
            'id_fabricante' =>  $idFabricante,
            'operatividad'  =>  $request->operatividad,
            'en_uso'  =>  $request->en_uso,
            'grupo'  =>  $request->grupo,
        );

        $guardarTablero = Tableros::insert($tablero);

        // request()->validate(Tableros::$rules);

        // $tablero = Tableros::create($request->all());

        return redirect()->route('tableros.index')
        ->with('success', 'Tablero creado con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tablero = Tableros::join('tipo_tension_tablero','tableros.id_tipo_tension','tipo_tension_tablero.id')
        ->join('infraestructura','tableros.id_infraestructura','infraestructura.id')
        ->join('operatividad','tableros.operatividad','operatividad.id')
        ->join('fabricante','tableros.id_fabricante','fabricante.id')
        ->select(
            'tableros.id',
            'tableros.ancho',
            'tableros.alto',
            'tableros.profundidad',
            'tableros.aislante',
            'tableros.capacidad',
            'operatividad.operatividad',
            'tableros.en_uso',
            'tableros.grupo',
            'tipo_tension_tablero.tipo_tension_tablero',
            'infraestructura.nombre_infraestructura',
            'fabricante.nombre_fabricante',
            'fabricante.modelo',
            'fabricante.serial',
            'fabricante.origen',
            'tableros.deleted_at',
            'tableros.created_at',
            'tableros.updated_at',
        )
        ->find($id);
        // dd($tablero);

        return view('tableros.show', compact('tablero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tablero = Tableros::find($id);
        $tipo  = TipoTensionTablero::get()->all();
        $fabricante = Fabricante::find($tablero->id_fabricante);
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $operatividad = Operatividad::get()->all();

        return view('tableros.edit', compact('tablero','fabricante','tipo','estacion','operatividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tablero $tablero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tableros $tablero)
    {
        // dd($tablero->id_fabricante);

        $tableros = array(
            'ancho'  =>  $request->ancho,
            'alto'  =>  $request->alto,
            'profundidad'  =>  $request->profundidad,
            'aislante'  =>  $request->aislante,
            'capacidad'  =>  $request->capacidad,
            'id_infraestructura'  =>  $request->estacion,
            'id_tipo_tension'   =>  $request->tension,
            'id_fabricante' =>  $tablero->id_fabricante,
            'operatividad'  =>  $request->operatividad,
            'en_uso'  =>  $request->en_uso,
            'grupo'  =>  $request->grupo,
        );
        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );
        
        $guardarFabricante = Fabricante::find($tablero->id_fabricante)->update($fabricante);

        $actualizarTablero = Tableros::find($request->id)->update($tableros);
        // dd($actualizarTablero);

        // request()->validate(Tableros::$rules);

        // $tablero->update($request->all());

        return redirect()->route('tableros.index')
        ->with('success', 'Tablero updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tablero = Tableros::find($id)->delete();

        return redirect()->route('tableros.index')
        ->with('success', 'Tablero deleted successfully');
    }
}
