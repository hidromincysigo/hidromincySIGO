<?php

namespace App\Http\Controllers;

use App\Models\Valvula;
use App\Models\TipoValvula;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
use App\Models\Infraestructura;
use App\Models\TipoAccionamientoValvula;
use App\Models\Operatividad;
use Illuminate\Http\Request;

/**
 * Class ValvulaController
 * @package App\Http\Controllers
 */
class ValvulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valvulas = Valvula::join('tipo_valvulas','valvulas.id_tipo_valvula','tipo_valvulas.id')
        ->join('tipo_accionamiento_valvula','valvulas.accionamiento','tipo_accionamiento_valvula.id')
        ->join('operatividad','valvulas.operatividad','operatividad.id')
        ->join('infraestructura','valvulas.id_infraestructura','infraestructura.id')
        ->select('valvulas.id',
        'valvulas.diametro',
        'valvulas.presion_nominal',
        'valvulas.accionamiento',
        'valvulas.fc',
        'operatividad.operatividad',
        'en_uso',
        'valvulas.deleted_at',
        'valvulas.created_at',
        'valvulas.updated_at',
        'tipo_valvulas.tipo_valvula',
        'tipo_accionamiento_valvula.tipo_accionamiento',
        'infraestructura.nombre_infraestructura',)
        ->paginate();

        // dd($valvulas);

        return view('valvula.index', compact('valvulas'))
        ->with('i', (request()->input('page', 1) - 1) * $valvulas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $valvula = new Valvula();
        $fabricante = new Fabricante();
        $tipo = TipoValvula::get()->all();
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();
        $accionamiento = TipoAccionamientoValvula::get()->all();
        $operatividad = Operatividad::get()->all();
        
        return view('valvula.create', compact('valvula', 'tipo', 'estacion', 'fabricante','accionamiento','operatividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );

        $guardarFabricante = Fabricante::insert($fabricante);
        $idFabricante = Fabricante::max('id');

        $valvula = array (
         'diametro' => $request->diametro,
         'presion_nominal' => $request->presion_nominal,
         'id_tipo_valvula' => $request->tipo,
         'accionamiento' => $request->accionamiento,
         'fc' => $request->fc,
         'operatividad' => $request->operatividad,
         'id_infraestructura' => $request->estacion,
         'id_fabricante' => $idFabricante,
         'en_uso' => $request->en_uso,
     );

        $guardarValvula = Valvula::insert($valvula);

    //     // request()->validate(Valvula::$rules);

    //     // $valvula = Valvula::create($request->all());

        return redirect()->route('valvulas.index')
        ->with('success', 'Valvula creada con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valvula = Valvula::find($id);

        return view('valvula.show', compact('valvula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $valvula = Valvula::find($id);
        $tipo = TipoValvula::get()->all();
        $fabricante = Fabricante::find($valvula->id_fabricante);
        $estacion = Infraestructura::where('id_sistema','9')->get()->all();

        return view('valvula.edit', compact('valvula','fabricante','tipo','estacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Valvula $valvula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valvula $valvula)
    {

        $actualizarFabricante = array(
            'nombre_fabricante' => $request->nombre_fabricante,
            'modelo' => $request->modelo,
            'serial' => $request->serial,
            'origen' => $request->origen,
            // 'ficha' => $request->ficha,
        );

        $guardarFabricante = Fabricante::where('id',$valvula->id_fabricante)->insert($actualizarFabricante);
        // $idFabricante = Fabricante::max('id');

        $actualizarValvula = array (
         'diametro' => $request->diametro,
         'presion_nominal' => $request->presion_nominal,
         'id_tipo_valvula' => $request->tipo,
         'accionamiento' => $request->accionamiento,
         'fc' => $request->fc,
         'operatividad' => $request->operatividad,
         'id_infraestructura' => $request->estacion,
         'id_fabricante' => $valvula->id_fabricante,
         'en_uso' => $request->en_uso,
     );

        $guardarValvula = Valvula::where('id',$valvula->id)->insert($actualizarValvula);

        // request()->validate(Valvula::$rules);

        // $valvula->update($request->all());

        return redirect()->route('valvulas.index')
        ->with('success', 'Valvula updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $valvula = Valvula::find($id)->delete();

        return redirect()->route('valvulas.index')
        ->with('success', 'Valvula deleted successfully');
    }
}
