<?php

namespace App\Http\Controllers;

use App\Models\Bomba;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
use App\Models\Infraestructura;
use App\Models\Operatividad;
use Illuminate\Http\Request;

/**
 * Class BombaController
 * @package App\Http\Controllers
 */
class BombaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bombas = Bomba::join('infraestructura','bombas.id_infraestructura','infraestructura.id')
        // ->join('operatividad','bombas.operatividad','operatividad.id')
        // ->select('bombas.id',
        // 'bombas.grupo',
        // 'bombas.nro_etapas',
        // 'bombas.rotacion',
        // 'bombas.caudal',
        // 'bombas.presion',
        // 'bombas.rpm',
        // 'bombas.peso',
        // 'bombas.diametro_succion',
        // 'bombas.diametro_descarga',
        // 'bombas.tipo_sello',
        // 'operatividad.operatividad',
        // 'bombas.en_uso',
        // 'bombas.id_infraestructura',
        // 'bombas.id_fabricante',
        // 'nombre_infraestructura',
        // 'id_coordenadas',
        // 'id_proceso',
        // 'id_sistema',
        // 'id_acueducto',
        // )
        // ->paginate();

        return view('bomba.index');
            // ->with('i', (request()->input('page', 1) - 1) * $bombas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bomba = new Bomba();
        $fabricante = new Fabricante();
        $operatividad = Operatividad::get()->all();

        $estacion = Infraestructura::where('id_sistema','9')->get()->all();

        return view('bomba.create', compact('bomba', 'estacion', 'fabricante','operatividad'));
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

        // request()->validate(Bomba::$rules);
        // request()->validate(Fabricante::$rules);

        $request->validate([
            'serial' => 'unique:fabricante',
        ]);

        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            //'ficha' => $request->ficha,
        );

        $guardarFabricante = Fabricante::insert($fabricante);
        $idFabricante = Fabricante::max('id');

        $bomba = array(
            'grupo' => $request->grupo,
            'nro_etapas' => $request->nro_etapas,
            'rotacion' => $request->rotacion,
            'caudal' => $request->caudal,
            'presion' => $request->presion,
            'rpm' => $request->rpm,
            'peso' => $request->peso,
            'diametro_succion' => $request->diametro_succion,
            'diametro_descarga' => $request->diametro_descarga,
            'tipo_sello' => $request->tipo_sello,
            'operatividad' => $request->operatividad,
            'en_uso' => $request->en_uso,
            'id_infraestructura' => $request->estacion,
            'id_fabricante' => $idFabricante,
        );

        $guardarBomba = Bomba::insert($bomba);

        // request()->validate(Bomba::$rules);

        // $bomba = Bomba::create($request->all());

        return redirect()->route('bombas.index')
            ->with('success', 'Bomba Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bomba = Bomba::join('operatividad','bombas.operatividad','operatividad.id')
        ->find($id);
        $fabricante = Fabricante::find($bomba->id_fabricante);

        return view('bomba.show', compact('bomba','fabricante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bomba = Bomba::find($id);
        $fabricante = Fabricante::find($bomba->id_fabricante);
        $operatividad = Operatividad::get()->all();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();

        return view('bomba.edit', compact('bomba','fabricante','estacion','operatividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bomba $bomba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bomba $bomba)
    {

        // dd($request,$bomba->id);
        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
        //  'ficha' => $request->ficha,
        );

        $updateFabricante = Fabricante::where('id',$bomba->id_fabricante)->update($fabricante);

        $bombaEdit = array(
            'grupo' => $request->grupo,
            'nro_etapas' => $request->nro_etapas,
            'rotacion' => $request->rotacion,
            'caudal' => $request->caudal,
            'presion' => $request->presion,
            'rpm' => $request->rpm,
            'peso' => $request->peso,
            'diametro_succion' => $request->diametro_succion,
            'diametro_descarga' => $request->diametro_descarga,
            'tipo_sello' => $request->tipo_sello,
            'operatividad' => $request->operatividad,
            'en_uso' => $request->en_uso,
            'id_infraestructura' => $request->estacion,
            'id_fabricante' => $bomba->id_fabricante,
        );

        $updateBomba = Bomba::find($bomba->id)->update($bombaEdit);

        // request()->validate(Bomba::$rules);

        // $bomba->update($request->all());

        return redirect()->route('bombas.index')
            ->with('success', 'Bomba updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bomba = Bomba::find($id)->delete();

        return redirect()->route('bombas.index')
            ->with('success', 'Bomba deleted successfully');
    }
}
