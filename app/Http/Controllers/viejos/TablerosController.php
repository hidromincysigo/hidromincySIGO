<?php

namespace App\Http\Controllers;

use App\Models\Tableros;
use App\Models\TipoTensionTablero;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
use App\Models\Infraestructura;
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
        $tableros = Tableros::paginate();

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
        return view('tableros.create', compact('tablero', 'tipo', 'estacion', 'fabricante'));
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
            ->with('success', 'Tablero created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tablero = Tableros::join('estacion_bombeo','tableros.id_infraestructura','estacion_bombeo.id')
        ->join('tipo_tension_tablero','tableros.id_tipo_tension','tipo_tension_tablero.id')
        ->join('fabricante','tableros.id_fabricante','fabricante.id')
        ->find($id);

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

        return view('tableros.edit', compact('tablero','fabricante','tipo','estacion'));
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

        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );
        
        $guardarFabricante = Fabricante::find($tablero->id_fabricante)->update($fabricante);

        $tablero = array(
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

        $actualizarTablero = Tableros::find($request->id)->update($tablero);
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
