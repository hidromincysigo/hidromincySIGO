<?php

namespace App\Http\Controllers;

use App\Models\Tuberias;
use App\Models\TipoMaterial;
use App\Models\TipoTuberia;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
use App\Models\Manifold;
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
        $tuberias = Tuberias::paginate();

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
        $estacion = EstacionBombeo::get()->all();
        $fabricante = Fabricante::get()->all();
        $material = TipoMaterial::get()->all();
        $tipo = TipoTuberia::get()->all();
        $manifold = Manifold::get()->all();
        return view('tuberias.create', compact('tuberia','tipo', 'estacion', 'fabricante', 'material', 'manifold'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tuberias::$rules);

        $tuberia = Tuberias::create($request->all());

        return redirect()->route('tuberias.index')
            ->with('success', 'Tuberia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tuberia = Tuberias::find($id);

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

        return view('tuberias.edit', compact('tuberia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tuberia $tuberia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuberia $tuberia)
    {
        request()->validate(Tuberias::$rules);

        $tuberia->update($request->all());

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
