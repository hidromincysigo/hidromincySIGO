<?php

namespace App\Http\Controllers;

use App\Models\Motores;
use App\Models\TipoArranque;
use App\Models\TipoInterruptor;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
use App\Models\Infraestructura;
use App\Models\Operatividad;
use App\Models\TipoMotor;
use Illuminate\Http\Request;

/**
 * Class MotoreController
 * @package App\Http\Controllers
 */
class MotoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motores = Motores::join('tipo_motor','motores.id_tipo_motor','tipo_motor.id')->join('tipo_arranque','motores.id_tipo_arranque','tipo_arranque.id')
        ->join('tipo_interruptor','motores.id_tipo_interruptor','tipo_interruptor.id')->join('operatividad','motores.operatividad','operatividad.id')
        ->join('infraestructura','motores.id_infraestructura','infraestructura.id')
        ->select(
        'motores.id',
        'motores.potencia',
        'motores.amperaje',
        'motores.tension',
        'motores.rpm',
        'motores.capacidad_amperio',
        'motores.contactor',
        'motores.rele_termico',
        'motores.temperatura',
        'motores.id_tipo_interruptor',
        'motores.id_tipo_arranque',
        'motores.id_infraestructura',
        'motores.id_fabricante',
        'motores.supervisor_fase',
        'operatividad.operatividad',
        'motores.en_uso',
        'motores.grupo',
        'motores.deleted_at',
        'motores.created_at',
        'motores.updated_at',
        'motores.id_tipo_motor',
        'tipo_motor.tipo_motor',
        'tipo_arranque.tipo_arranque',
        'tipo_interruptor.tipo_interruptor',
        'infraestructura.nombre_infraestructura'
        )->paginate();
        // dd($motores);
        return view('motores.index', compact('motores'))
            ->with('i', (request()->input('page', 1) - 1) * $motores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motores = new Motores();
        $fabricante = new Fabricante();
        $arranque = TipoArranque::get()->all();
        $interruptor = TipoInterruptor::get()->all();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $tipoMotor = TipoMotor::get()->all();
        $operatividad = Operatividad::get()->all();

        return view('motores.create', compact('motores', 'arranque', 'interruptor', 'estacion', 'fabricante','tipoMotor','operatividad'));
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

        $motor = array(
            'potencia' => $request->potencia,
            'amperaje' => $request->amperaje,
            'tension' => $request->tension,
            'rpm' => $request->rpm,
            'capacidad_amperio' => $request->capacidad_amperio,
            'contactor' => $request->contactor,
            'rele_termico' => $request->rele_termico,
            'temperatura' => $request->temperatura,
            'id_tipo_interruptor' => $request->interruptor,
            'id_tipo_arranque' => $request->arranque,
            'id_infraestructura' => $request->estacion,
            'id_fabricante' => $idFabricante,
            'supervisor_fase' => $request->supervisor_fase,
            'operatividad' => $request->operatividad,
            'en_uso' => $request->en_uso,
            'grupo' => $request->grupo,
            'id_tipo_motor' => $request->tipoMotor,
        );

        $guardarMotor = Motores::insert($motor);

        // request()->validate(Motores::$rules);

        // $motore = Motores::create($request->all());

        return redirect()->route('motores.index')
            ->with('success', 'Motor creado con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $motore = Motores::join('tipo_arranque','motores.id_tipo_arranque','tipo_arranque.id')
        ->join('tipo_interruptor','motores.id_tipo_interruptor','tipo_interruptor.id')
        ->join('infraestructura','motores.id_infraestructura','infraestructura.id')
        ->join('fabricante','motores.id_fabricante','fabricante.id')
        ->join('operatividad','motores.operatividad','operatividad.id')
        ->find($id);
        // dd($motore);
        return view('motores.show', compact('motore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Motores $motore)
    {
        dd($motore);
        $motores = Motores::find($motore->id);
        $fabricante = Fabricante::find($motore->id_fabricante);
        $arranque = TipoArranque::get()->all();
        $interruptor = TipoInterruptor::get()->all();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $tipoMotor = TipoMotor::get()->all();
        $operatividad = Operatividad::get()->all();

        return view('motores.edit', compact('motores', 'arranque', 'interruptor', 'estacion', 'fabricante','tipoMotor','operatividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Motore $motore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motores $motore)
    {
        // dd($motore,$fabricante);
        // $id = Motores::find($request->id);

        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );
        
        $guardarFabricante = Fabricante::find($motore->id_fabricante)->update($fabricante);

        $motor = array(
            'potencia' => $request->potencia,
            'amperaje' => $request->amperaje,
            'tension' => $request->tension,
            'rpm' => $request->rpm,
            'capacidad_amperio' => $request->capacidad_amperio,
            'contactor' => $request->contactor,
            'rele_termico' => $request->rele_termico,
            'temperatura' => $request->temperatura,
            'id_tipo_interruptor' => $request->interruptor,
            'id_tipo_arranque' => $request->arranque,
            'id_infraestructura' => $request->estacion,
            'id_fabricante' => $motore->id_fabricante,
            'supervisor_fase' => $request->supervisor_fase,
            'operatividad' => $request->operatividad,
            'en_uso' => $request->en_uso,
            'grupo' => $request->grupo,
            'id_tipo_motor' => $request->tipoMotor,
        );
        $actualizarMotores = Motores::find($motore->id)->update($motor);

        // dd($guardarFabricante);
        // request()->validate(Motores::$rules);

        // $motore->update($request->all());

        return redirect()->route('motores.index')
            ->with('success', 'Motore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $motore = Motores::find($id)->delete();

        return redirect()->route('motores.index')
            ->with('success', 'Motore deleted successfully');
    }
}
