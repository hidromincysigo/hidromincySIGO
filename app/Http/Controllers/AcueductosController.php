<?php

namespace App\Http\Controllers;

use App\Models\Acueducto;
use Illuminate\Http\Request;

/**
 * Class AcueductoController
 * @package App\Http\Controllers
 */
class AcueductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acueductos = Acueductos::paginate();

        return view('acueducto.index', compact('acueducto'))
            ->with('i', (request()->input('page', 1) - 1) * $acueductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acueducto = new Acueductos();
        return view('acueducto.create', compact('acueducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Acueductos::$rules);

        $acueducto = Acueductos::create($request->all());

        return redirect()->route('acueducto.index')
            ->with('success', 'Acueducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acueducto = Acueductos::find($id);

        return view('acueducto.show', compact('acueducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acueducto = Acueductos::find($id);

        return view('acueducto.edit', compact('acueducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Acueducto $acueducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acueductos $acueducto)
    {
        request()->validate(Acueductos::$rules);

        $acueducto->update($request->all());

        return redirect()->route('acueducto.index')
            ->with('success', 'Acueducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $acueducto = Acueductos::find($id)->delete();

        return redirect()->route('acueducto.index')
            ->with('success', 'Acueducto deleted successfully');
    }
}
