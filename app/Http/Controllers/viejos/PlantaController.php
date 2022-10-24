<?php

namespace App\Http\Controllers;

use App\Models\Planta;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Acueducto;
use App\Models\Sistema;
use App\Models\TipoPlanta;
use App\Models\Infraestructura;
use App\Models\TipoInfraestructura;
use App\Models\UbicacionGeografica;
use Illuminate\Http\Request;

/**
 * Class PlantaController
 * @package App\Http\Controllers
 */
class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantas = Planta::paginate();

        return view('planta.index', compact('plantas'))
            ->with('i', (request()->input('page', 1) - 1) * $plantas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planta = new Planta();
        $infraestructura = new Infraestructura();
        $ubicacionGeografica = new UbicacionGeografica();
        $tipoplanta = TipoPlanta::get()->all();
        $estados = Estado::get()->all();
        $tipoin = TipoInfraestructura::get()->all();
        $sistemas = Sistema::get()->all();
        $acueducto = Acueducto::get()->all();
        return view('planta.create', compact('planta', 'infraestructura', 'estados','ubicacionGeografica','tipoin','sistemas','acueducto', 'tipoplanta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Planta::$rules);

        $planta = Planta::create($request->all());

        return redirect()->route('plantas.index')
            ->with('success', 'Planta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planta = Planta::find($id);

        return view('planta.show', compact('planta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planta = Planta::find($id);

        return view('planta.edit', compact('planta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Planta $planta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planta $planta)
    {
        request()->validate(Planta::$rules);

        $planta->update($request->all());

        return redirect()->route('plantas.index')
            ->with('success', 'Planta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $planta = Planta::find($id)->delete();

        return redirect()->route('plantas.index')
            ->with('success', 'Planta deleted successfully');
    }
}
