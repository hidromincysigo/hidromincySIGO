<?php

namespace App\Http\Controllers;

use App\Models\Motores;
use App\Models\TipoArranque;
use App\Models\TipoInterruptor;
use App\Models\EstacionBombeo;
use App\Models\Fabricante;
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
        $motores = Motores::paginate();

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
        $arranque = TipoArranque::get()->all();
        $interruptor = TipoInterruptor::get()->all();
        $estacion = EstacionBombeo::get()->all();
        $fabricante = Fabricante::get()->all();
        return view('motores.create', compact('motores', 'arranque', 'interruptor', 'estacion', 'fabricante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Motores::$rules);

        $motore = Motores::create($request->all());

        return redirect()->route('motores.index')
            ->with('success', 'Motore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motore = Motores::find($id);

        return view('motores.show', compact('motore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motore = Motores::find($id);

        return view('motores.edit', compact('motore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Motore $motore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motore $motore)
    {
        request()->validate(Motores::$rules);

        $motore->update($request->all());

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
