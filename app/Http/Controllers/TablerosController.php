<?php

namespace App\Http\Controllers;

use App\Models\Tableros;
use App\Models\TipoTensionTablero;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
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
        $estacion = EstacionBombeo::get()->all();
        $fabricante = Fabricante::get()->all();
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
        request()->validate(Tableros::$rules);

        $tablero = Tableros::create($request->all());

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
        $tablero = Tableros::find($id);

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

        return view('tableros.edit', compact('tablero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tablero $tablero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablero $tablero)
    {
        request()->validate(Tableros::$rules);

        $tablero->update($request->all());

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
