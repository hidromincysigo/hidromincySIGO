<?php

namespace App\Http\Controllers;

use App\Models\Acueducto;
use App\Models\Estado;
use Illuminate\Http\Request;

class AcueductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-Acueductos|crear-Acueductos|editar-Acueductos|borrar-Acueductos', ['only' => ['index']]);
        $this->middleware('permission:crear-Acueductos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-Acueductos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-Acueductos', ['only' => ['destroy']]);
    }

    public function index()
    {
        //$acueductos = Acueducto::paginate();
        //  return view('acueducto.index', compact('acueductos'));

        $acueductos = Acueducto::paginate();

        return view('acueducto.index', compact('acueductos'))
          ->with('i', (request()->input('page', 1) - 1) * $acueductos->perPage());
    }

    public function create()
    {
        $acueducto = new Acueducto();

        return view('acueducto.create', compact('acueducto'));
    }

    public function store(Request $request)
    {
        //
        request()->validate(Acueducto::$rules);

        $acueducto = Acueducto::create($request->all());

        return redirect()->route('acueducto.index')
            ->with('success', 'Acueducto created successfully.');
    }

    public function show($id)
    {
        //
        $estado = Estado::all();
        $acueducto = Acueducto::find($id);

        return view('acueducto.show', compact('acueducto', 'estado'));
    }

    public function edit($id)
    {
        //
        $acueducto = Acueducto::find($id);

        return view('acueducto.edit', compact('acueducto'));
    }

    public function update(Request $request, Acueducto $acueducto)
    {
        request()->validate(Acueducto::$rules);
        $acueducto->update($request->all());

        return redirect()->route('acueducto.index')
            ->with('success', 'Acueducto updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acueducto  $acueducto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $acueducto = Acueducto::find($id)->delete();

        return redirect()->route('acueducto.index')
            ->with('success', 'Acueducto deleted successfully');
    }
}
