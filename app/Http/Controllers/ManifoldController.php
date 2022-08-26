<?php

namespace App\Http\Controllers;

use App\Models\Manifold;
use App\Models\TipoManifold;
use App\Models\EstacionBombeo;
use Illuminate\Http\Request;

/**
 * Class ManifoldController
 * @package App\Http\Controllers
 */
class ManifoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manifolds = Manifold::paginate();

        return view('manifold.index', compact('manifolds'))
            ->with('i', (request()->input('page', 1) - 1) * $manifolds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manifold = new Manifold();
        $estacion = EstacionBombeo::get()->all();
        $tipo = TipoManifold::get()->all();
        return view('manifold.create', compact('manifold', 'estacion', 'tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Manifold::$rules);

        $manifold = Manifold::create($request->all());

        return redirect()->route('manifolds.index')
            ->with('success', 'Manifold created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manifold = Manifold::find($id);

        return view('manifold.show', compact('manifold'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manifold = Manifold::find($id);

        return view('manifold.edit', compact('manifold'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Manifold $manifold
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manifold $manifold)
    {
        request()->validate(Manifold::$rules);

        $manifold->update($request->all());

        return redirect()->route('manifolds.index')
            ->with('success', 'Manifold updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $manifold = Manifold::find($id)->delete();

        return redirect()->route('manifolds.index')
            ->with('success', 'Manifold deleted successfully');
    }
}
