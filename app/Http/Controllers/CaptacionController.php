<?php

namespace App\Http\Controllers;

use App\Models\Captacion;
use Illuminate\Http\Request;

class CaptacionController extends Controller
{
    /**
     * CREADO POR -> GLINYER FRANCO.
     *  SE CREA EL CONSTRUCTOR ASIGNANDO LOS PERMISOS.
     */
    public function __construct()
    {
        $this->middleware('permission:ver-captacion|crear-captacion|editar-captacion|borrar-captacion', ['only' => ['index']]);
        $this->middleware('permission:crear-captacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-captacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-captacion', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
        $cap = Captacion::all();

        // return view('captacion.index', compact('cap'))
        //   ->with('i', (request()->input('page', 1) - 1) * $cap->perPage());

        dd($cap);
    }

    public function create()
    {
        $captacion = new Captacion();

        return view('captacion.create', compact('captacion'));
    }

    public function store(Request $request)
    {
        request()->validate(Captacion::$rules);
        $captacion = Captacion::create($request->all());

        return redirect()->route('captacions.index')
            ->with('success', 'se ha creado la captacion correctamente');
    }

    public function show($id)
    {
        $captacion = Captacion::find($id);

        return view('captacion.show', compact('captacion'));
    }

    public function edit($id)
    {
        $captacion = Captacion::find($id);

        return view('captacion.edit', compact('captacion'));
    }

    public function update(Request $request, Captacion $captacion)
    {
        request()->validate(Captacion::$rules);

        $captacion->update($request->all());

        return redirect()->route('captacions.index')
            ->with('success', 'se ha actualizado la captacion correctamente');
    }

    public function destroy($id)
    {
        $captacion = Captacion::find($id)->delete();

        return redirect()->route('captacions.index')
                ->with('success', 'se ha eliminado la captacion correctamente');
    }
}
