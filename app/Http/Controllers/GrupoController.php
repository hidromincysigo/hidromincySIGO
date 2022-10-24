<?php

namespace App\Http\Controllers;

use App\Models\AsignacionGrupo;
use App\Models\Equipo;
use Illuminate\Http\Request;

/**
 * Class AsignacionGrupoController
 * @package App\Http\Controllers
 */
class AsignacionGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $asignacionGrupos = Equipo::get()->all()->paginate();
        $equipos = Equipo::join('tipo_equipo','equipos.tipo_equipo','tipo_equipo.id')
        ->select(
        'equipos.id',
        'tipo_equipo.tipo_equipo',
        'equipos.nombre_equipo',
        'equipos.marca',
        'equipos.modelo',
        )->paginate();

        return view('grupos.index', compact('equipos'))
            ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignacionGrupo = new AsignacionGrupo();
        return view('grupos.create', compact('asignacionGrupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AsignacionGrupo::$rules);

        $asignacionGrupo = AsignacionGrupo::create($request->all());

        return redirect()->route('grupos.index')
            ->with('success', 'AsignacionGrupo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignacionGrupo = AsignacionGrupo::find($id);

        return view('grupos.show', compact('asignacionGrupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignacionGrupo = AsignacionGrupo::find($id);

        return view('grupos.edit', compact('asignacionGrupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AsignacionGrupo $asignacionGrupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignacionGrupo $asignacionGrupo)
    {
        request()->validate(AsignacionGrupo::$rules);

        $asignacionGrupo->update($request->all());

        return redirect()->route('grupos.index')
            ->with('success', 'AsignacionGrupo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asignacionGrupo = AsignacionGrupo::find($id)->delete();

        return redirect()->route('grupos.index')
            ->with('success', 'AsignacionGrupo deleted successfully');
    }
}
