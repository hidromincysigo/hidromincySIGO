<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\TipoEquipo;
use App\Models\TipoManifold;
use App\Models\TipoArranque;
use App\Models\TipoInterruptor;
use App\Models\TipoMotor;
use App\Models\TipoTensionTablero;
use App\Models\TipoMaterial;
use App\Models\TipoTuberia;
use App\Models\TipoAccionamientoValvula;
use App\Models\TipoValvula;
use App\Models\Bomba;
use App\Models\Manifold;
use App\Models\Motores;
use App\Models\Tableros;
use App\Models\Tuberias;
use App\Models\Valvula;
use SweetAlert2;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::join('tipo_equipo','equipos.tipo_equipo','tipo_equipo.id')
        ->select(
        'equipos.id',
        'tipo_equipo.tipo_equipo',
        'equipos.nombre_equipo',
        'equipos.marca',
        'equipos.modelo',
        )->paginate();
        // dd($equipos);

        return view('equipo.index', compact('equipos'))
        ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = new Equipo();
        $bomba = new Bomba();
        $manifold = new Manifold();
        $motores = new Motores();
        $tablero = new Tableros();
        $tuberia = new Tuberias();
        $valvula = new Valvula();
        $tipoEquipo = TipoEquipo::orderby('tipo_equipo','asc')->get()->all();
        $tipoManifold = TipoManifold::get()->all();
        $arranque = TipoArranque::get()->all();
        $interruptor = TipoInterruptor::get()->all();
        $tipoMotor = TipoMotor::get()->all();
        $tipoTension = TipoTensionTablero::get()->all();
        $material = TipoMaterial::get()->all();
        $tipoTuberia = TipoTuberia::get()->all();
        $accionamiento = TipoAccionamientoValvula::get()->all();
        $tipoValvula = TipoValvula::get()->all();

        return view('equipo.create', compact('equipo','bomba','manifold','motores','tablero','tuberia','valvula','tipoEquipo','tipoManifold','arranque','interruptor','tipoMotor','tipoTension','material','tipoTuberia','tipoValvula','accionamiento'));
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
            'tipo_equipo' => 'required',
            'nombre_equipo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
        ]);

        if($request->tipo_equipo === '1'){
            $request->validate([
                'nro_etapas'=>'integer|required',
                'rotacion'=>'required|numeric',
                'caudal'=>'required|numeric',
                'presion'=>'required|numeric',
                'rpm'=>'required|numeric',
                'peso'=>'required|numeric',
                'diametro_succion'=>'required|numeric',
                'diametro_descarga'=>'required|numeric',
                'tipo_sello'=>'required',
            ]);
        }

        if($request->tipo_equipo === '2'){
            $request->validate([
                'tipoManifold' => 'required',
                'cant_bridas' => 'required|integer',
                'cant_monometros' => 'required|integer',
                'cant_valvulas' => 'required|integer',
                'cant_tuberias' => 'required|integer',
            ]);
        }


        if($request->tipo_equipo === '3'){
            $request->validate([
                'potencia' => 'required|numeric',
                'amperaje' => 'required|numeric',
                'tension' => 'required|numeric',
                'rpmMotor' => 'required|numeric',
                'capacidad_amperio' => 'required|numeric',
                'contactor' => 'required|numeric',
                'rele_termico' => 'required|numeric',
                'temperatura' => 'required|numeric',
                'tipoMotor' => 'required',
                'arranque' => 'required',
                'interruptor' => 'required',
                'supervisor_fase' => 'required',
            ]);
        }

        if($request->tipo_equipo === '4'){
            $request->validate([
                'ancho' => 'required|numeric',
                'alto' => 'required|numeric',
                'profundidad' => 'required|numeric',
                'aislante' => 'required|numeric',
                'capacidad' => 'required|numeric',
                'tensionTablero' => 'required',
            ]);
        }

        if($request->tipo_equipo === '5'){
            $request->validate([
                'diametro' => 'required|numeric',
                'norma' => 'required',
                'grado' => 'required',
                'espesor' => 'required|numeric',
                'longitud' => 'required|numeric',
                'sdr' => 'required|numeric',
                'pn' => 'required|numeric',
                'rde' => 'required|numeric',
                'tuberia' => 'required',
                'material' => 'required',
            ]);
        }

        if($request->tipo_equipo === '6'){
            $request->validate([
                'diametroValvula' => 'required|numeric',
                'presion_nominal' => 'required|numeric',
                'tipoValvula' => 'required',
                'accionamiento' => 'required',
                'fc' => 'required|numeric',
            ]);
        }
        $guardarEquipo = Equipo::create($request->all());
        $idEquipo = Equipo::max('id');

        $crearBomba = array(
            'nro_etapas'=> $request->nro_etapas,
            'rotacion'=> $request->rotacion,
            'caudal'=> $request->caudal,
            'presion'=> $request->presion,
            'rpm'=> $request->rpm,
            'peso'=> $request->peso,
            'diametro_succion'=> $request->diametro_succion,
            'diametro_descarga'=> $request->diametro_descarga,
            'tipo_sello'=> $request->tipo_sello,
            'id_equipo' => $idEquipo,
        );

        $crearManifold = array(
            'id_tipo_manifold' => $request->tipoManifold,
            'cant_bridas' => $request->cant_bridas,
            'cant_monometro' => $request->cant_monometros,
            'cant_valvulas' => $request->cant_valvulas,
            'cant_tuberias' => $request->cant_tuberias,
            'id_equipo' => $idEquipo,
        );

        $crearMotor = array(
            'potencia' => $request->potencia,
            'amperaje' => $request->amperaje,
            'tension' => $request->tension,
            'rpm' => $request->rpmMotor,
            'capacidad_amperio' => $request->capacidad_amperio,
            'contactor' => $request->contactor,
            'rele_termico' => $request->rele_termico,
            'temperatura' => $request->temperatura,
            'id_tipo_motor' => $request->tipoMotor,
            'id_tipo_arranque' => $request->arranque,
            'id_tipo_interruptor' => $request->interruptor,
            'supervisor_fase' => $request->supervisor_fase,
            'id_equipo' => $idEquipo,
        );

        $crearTablero = array(
            'ancho' => $request->ancho,
            'alto' => $request->alto,
            'profundidad' => $request->profundidad,
            'aislante' => $request->aislante,
            'capacidad' => $request->capacidad,
            'id_tipo_tension' => $request->tensionTablero,
            'id_equipo' => $idEquipo,
        );

        $crearTuberia = array(
            'diametro' => $request->diametro,
            'norma' => $request->norma,
            'grado' => $request->grado,
            'espesor' => $request->espesor,
            'longitud' => $request->longitud,
            'sdr' => $request->sdr,
            'pn' => $request->pn,
            'rde' => $request->rde,
            'id_tipo_tuberia' => $request->tuberia,
            'id_tipo_material' => $request->material,
            'id_equipo' => $idEquipo,
        );

        $crearValvula = array(
            'diametro' => $request->diametroValvula,
            'presion_nominal' => $request->presion_nominal,
            'id_tipo_valvula' => $request->tipoValvula,
            'accionamiento' => $request->accionamiento,
            'fc' => $request->fc,
            'id_equipo' => $idEquipo,
        );

        if($request->tipo_equipo === '1'){
            $guardarBomba = Bomba::insert($crearBomba);
        }
        if($request->tipo_equipo === '2'){
            $guardarManifold = Manifold::insert($crearManifold);
        }
        if($request->tipo_equipo === '3'){
            $guardarMotor = Motores::insert($crearMotor);
        }
        if($request->tipo_equipo === '4'){
            $guardarTablero = Tableros::insert($crearTablero);
        }
        if($request->tipo_equipo === '5'){
            $guardarTuberia = Tuberias::insert($crearTuberia);
        }
        if($request->tipo_equipo === '6'){
            $guardarValvula = Valvula::insert($crearValvula);
        }


        // request()->validate(Equipo::$rules);

        // $equipo = Equipo::create($request->all());

        return redirect()->route('equipos.index')
        ->with('success', 'Equipo Creado con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::where(

        )->get()->first();


        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);
        $bomba = Bomba::where('id_equipo',$id)->get()->first();
        $manifold = Manifold::where('id_equipo',$id)->get()->first();
        $motores = Motores::where('id_equipo',$id)->get()->first();
        $tablero = Tableros::where('id_equipo',$id)->get()->first();
        $tuberia = Tuberias::where('id_equipo',$id)->get()->first();
        $valvula = Valvula::where('id_equipo',$id)->get()->first();
        $tipoEquipo = TipoEquipo::orderby('tipo_equipo','asc')->get()->all();
        $tipoManifold = TipoManifold::get()->all();
        $arranque = TipoArranque::get()->all();
        $interruptor = TipoInterruptor::get()->all();
        $tipoMotor = TipoMotor::get()->all();
        $tipoTension = TipoTensionTablero::get()->all();
        $material = TipoMaterial::get()->all();
        $tipoTuberia = TipoTuberia::get()->all();
        $accionamiento = TipoAccionamientoValvula::get()->all();
        $tipoValvula = TipoValvula::get()->all();

        return view('equipo.edit', compact('equipo','bomba','manifold','motores','tablero','tuberia','valvula','tipoEquipo','tipoManifold','arranque','interruptor','tipoMotor','tipoTension','material','tipoTuberia','tipoValvula','accionamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipo $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'tipo_equipo' => 'required',
            'nombre_equipo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
        ]);

        if($request->tipo_equipo === '1'){
            $request->validate([
                'nro_etapas'=>'integer|required',
                'rotacion'=>'required|numeric',
                'caudal'=>'required|numeric',
                'presion'=>'required|numeric',
                'rpm'=>'required|numeric',
                'peso'=>'required|numeric',
                'diametro_succion'=>'required|numeric',
                'diametro_descarga'=>'required|numeric',
                'tipo_sello'=>'required',
            ]);
        }

        if($request->tipo_equipo === '2'){
            $request->validate([
                'tipoManifold' => 'required',
                'cant_bridas' => 'required|integer',
                'cant_monometros' => 'required|integer',
                'cant_valvulas' => 'required|integer',
                'cant_tuberias' => 'required|integer',
            ]);
        }


        if($request->tipo_equipo === '3'){
            $request->validate([
                'potencia' => 'required|numeric',
                'amperaje' => 'required|numeric',
                'tension' => 'required|numeric',
                'rpmMotor' => 'required|numeric',
                'capacidad_amperio' => 'required|numeric',
                'contactor' => 'required|numeric',
                'rele_termico' => 'required|numeric',
                'temperatura' => 'required|numeric',
                'tipoMotor' => 'required',
                'arranque' => 'required',
                'interruptor' => 'required',
                'supervisor_fase' => 'required',
            ]);
        }

        if($request->tipo_equipo === '4'){
            $request->validate([
                'ancho' => 'required|numeric',
                'alto' => 'required|numeric',
                'profundidad' => 'required|numeric',
                'aislante' => 'required|numeric',
                'capacidad' => 'required|numeric',
                'tensionTablero' => 'required',
            ]);
        }

        if($request->tipo_equipo === '5'){
            $request->validate([
                'diametro' => 'required|numeric',
                'norma' => 'required',
                'grado' => 'required',
                'espesor' => 'required|numeric',
                'longitud' => 'required|numeric',
                'sdr' => 'required|numeric',
                'pn' => 'required|numeric',
                'rde' => 'required|numeric',
                'tuberia' => 'required',
                'material' => 'required',
            ]);
        }

        if($request->tipo_equipo === '6'){
            $request->validate([
                'diametroValvula' => 'required|numeric',
                'presion_nominal' => 'required|numeric',
                'tipoValvula' => 'required',
                'accionamiento' => 'required',
                'fc' => 'required|numeric',
            ]);
        }
        $crearEquipo = array(
            'tipo_equipo' => $request->tipo_equipo,
            'nombre_equipo' => $request->nombre_equipo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
        );
        $guardarEquipo = Equipo::where('equipos.id',$equipo->id)->update($crearEquipo);
        // $idEquipo = Equipo::max('id');

        $crearBomba = array(
            'nro_etapas'=> $request->nro_etapas,
            'rotacion'=> $request->rotacion,
            'caudal'=> $request->caudal,
            'presion'=> $request->presion,
            'rpm'=> $request->rpm,
            'peso'=> $request->peso,
            'diametro_succion'=> $request->diametro_succion,
            'diametro_descarga'=> $request->diametro_descarga,
            'tipo_sello'=> $request->tipo_sello,
            'id_equipo' => $equipo->id,
        );

        $crearManifold = array(
            'id_tipo_manifold' => $request->tipoManifold,
            'cant_bridas' => $request->cant_bridas,
            'cant_monometro' => $request->cant_monometros,
            'cant_valvulas' => $request->cant_valvulas,
            'cant_tuberias' => $request->cant_tuberias,
            'id_equipo' => $equipo->id,
        );

        $crearMotor = array(
            'potencia' => $request->potencia,
            'amperaje' => $request->amperaje,
            'tension' => $request->tension,
            'rpm' => $request->rpmMotor,
            'capacidad_amperio' => $request->capacidad_amperio,
            'contactor' => $request->contactor,
            'rele_termico' => $request->rele_termico,
            'temperatura' => $request->temperatura,
            'id_tipo_motor' => $request->tipoMotor,
            'id_tipo_arranque' => $request->arranque,
            'id_tipo_interruptor' => $request->interruptor,
            'supervisor_fase' => $request->supervisor_fase,
            'id_equipo' => $equipo->id,
        );

        $crearTablero = array(
            'ancho' => $request->ancho,
            'alto' => $request->alto,
            'profundidad' => $request->profundidad,
            'aislante' => $request->aislante,
            'capacidad' => $request->capacidad,
            'id_tipo_tension' => $request->tensionTablero,
            'id_equipo' => $equipo->id,
        );

        $crearTuberia = array(
            'diametro' => $request->diametro,
            'norma' => $request->norma,
            'grado' => $request->grado,
            'espesor' => $request->espesor,
            'longitud' => $request->longitud,
            'sdr' => $request->sdr,
            'pn' => $request->pn,
            'rde' => $request->rde,
            'id_tipo_tuberia' => $request->tuberia,
            'id_tipo_material' => $request->material,
            'id_equipo' => $equipo->id,
        );

        $crearValvula = array(
            'diametro' => $request->diametroValvula,
            'presion_nominal' => $request->presion_nominal,
            'id_tipo_valvula' => $request->tipoValvula,
            'accionamiento' => $request->accionamiento,
            'fc' => $request->fc,
            'id_equipo' => $equipo->id,
        );

        if($request->tipo_equipo === '1'){
            $guardarBomba = Bomba::where('id_equipo',$equipo->id)->update($crearBomba);
        }
        if($request->tipo_equipo === '2'){
            $guardarManifold = Manifold::where('id_equipo',$equipo->id)->update($crearManifold);
        }
        if($request->tipo_equipo === '3'){
            $guardarMotor = Motores::where('id_equipo',$equipo->id)->update($crearMotor);
        }
        if($request->tipo_equipo === '4'){
            $guardarTablero = Tableros::where('id_equipo',$equipo->id)->update($crearTablero);
        }
        if($request->tipo_equipo === '5'){
            $guardarTuberia = Tuberias::where('id_equipo',$equipo->id)->update($crearTuberia);
        }
        if($request->tipo_equipo === '6'){
            $guardarValvula = Valvula::where('id_equipo',$equipo->id)->update($crearValvula);
        }


        // request()->validate(Equipo::$rules);

        // $equipo->update($request->all());

        return redirect()->route('equipos.index')
        ->with('success', 'Equipo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id)->delete();

        return redirect()->route('equipos.index')
        ->with('success', 'Equipo deleted successfully');
    }
}
