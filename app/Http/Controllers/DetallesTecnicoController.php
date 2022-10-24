<?php

namespace App\Http\Controllers;

use App\Models\DetallesTecnico;
use App\Models\EstacionBombeo;
use App\Models\Infraestructura;
use Illuminate\Http\Request;

/**
 * Class DetallesTecnicoController
 * @package App\Http\Controllers
 */
class DetallesTecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallesTecnicos = DetallesTecnico::paginate();

        return view('detalles-tecnico.index', compact('detallesTecnicos'))
            ->with('i', (request()->input('page', 1) - 1) * $detallesTecnicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detallesTecnico = new DetallesTecnico();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();


        return view('detalles-tecnico.create', compact('detallesTecnico','estacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dtecnicos = array (
            'succion_min' => $request->succion_min,
            'succion_max' => $request->succion_max,
            'descarga_min' => $request->descarga_min,
            'descarga_max' => $request->descarga_max,
            'amp_min'   =>  $request->amp_min,
            'amp_max'   =>  $request->amp_max,
            'voltaje_min' => $request->voltaje_min,
            'voltaje_max'   => $request->voltaje_max,
            'id_infraestructura'  =>  $request->estacion,
        );

        $DetallesTecnicos = DetallesTecnico::insert($dtecnicos);

        // request()->validate(DetallesTecnico::$rules);

        // $detallesTecnico = DetallesTecnico::create($request->all());

        return redirect()->route('detalles_tecnicos.index')
            ->with('success', 'DetallesTecnico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $detallesTecnico = DetallesTecnico::find($id);

        return view('detalles-tecnico.show', compact('detallesTecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detallesTecnico = DetallesTecnico::find($id);
        $estacion = EstacionBombeo::get()->all();

        return view('detalles-tecnico.edit', compact('detallesTecnico','estacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetallesTecnico $detallesTecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallesTecnico $detallesTecnico)
    {
        // dd($detallesTecnico, $request);

        $dtecnicos = array (
            'succion_min' => $request->succion_min,
            'succion_max' => $request->succion_max,
            'descarga_min' => $request->descarga_min,
            'descarga_max' => $request->descarga_max,
            'amp_min'   =>  $request->amp_min,
            'amp_max'   =>  $request->amp_max,
            'voltaje_min' => $request->voltaje_min,
            'voltaje_max'   => $request->voltaje_max,
            'id_infraestructura'  =>  $request->estacion,
        );

        $dtecnicosUpdate = DetallesTecnico::find($detallesTecnico->id)->update($dtecnicos);
        // request()->validate(DetallesTecnico::$rules);

        // $detallesTecnico->update($request->all());

        return redirect()->route('detalles_tecnicos.index')
            ->with('success', 'DetallesTecnico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detallesTecnico = DetallesTecnico::find($id)->delete();

        return redirect()->route('detalles_tecnicos.index')
            ->with('success', 'DetallesTecnico deleted successfully');
    }
}
