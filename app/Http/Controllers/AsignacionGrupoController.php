<?php

namespace App\Http\Controllers;

use App\Models\AsignacionGrupo;
use App\Models\Infraestructura;
use App\Models\Operatividad;
use App\Models\TipoEquipo;
use App\Models\Equipo;
use App\Models\Bomba;
use App\Models\Manifold;
use App\Models\Motores;
use App\Models\Tableros;
use App\Models\Tuberias;
use App\Models\Valvula;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $asignacionGrupos = AsignacionGrupo::join('equipos','asignacion_grupos.id_equipo','equipos.id')->paginate();

        return view('grupos.index', compact('asignacionGrupos'))
        ->with('i', (request()->input('page', 1) - 1) * $asignacionGrupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignacionGrupo = new AsignacionGrupo();
        $infraestructura = Infraestructura::where('id_sistema',9)->get()->all();
        $tipoEquipo = TipoEquipo::get()->all();
        $operatividad = Operatividad::get();
        $bomba = Equipo::where('tipo_equipo','=',1)->get()->all();
        $manifold = Equipo::where('tipo_equipo','=',2)->get()->all();
        $motores = Equipo::where('tipo_equipo','=',3)->get()->all();
        $tablero = Equipo::where('tipo_equipo','=',4)->get()->all();
        $tuberia = Equipo::where('tipo_equipo','=',5)->get()->all();
        $valvula = Equipo::where('tipo_equipo','=',6)->get()->all();

        return view('grupos.create', compact('asignacionGrupo','bomba','manifold','motores','tablero','tuberia','valvula','infraestructura','tipoEquipo','operatividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function equipo()
    {
        // dd($_POST);
        $equipo = Equipo::where('tipo_equipo',$_POST['tipo'])->get()->all();
        return $equipo;
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_infraestructura' => 'required',
            'tipoEquipo' => 'required',
            'id_equipo' => 'required',
            'grupo' => 'required',
            'operatividad' => 'required',
            'en_uso' => 'required',
        ]);


        // request()->validate(AsignacionGrupo::$rules);

        $asignacionGrupo = AsignacionGrupo::create($request->all());

        return redirect()->route('grupos.index')
        ->with('success', 'Equipo asiganado a Grupo correctamente.');
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
