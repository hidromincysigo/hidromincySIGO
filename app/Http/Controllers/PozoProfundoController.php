<?php

namespace App\Http\Controllers;

use App\Models\PozoProfundo;
use Illuminate\Http\Request;

/**
 * Class PozoProfundoController
 * @package App\Http\Controllers
 */
class PozoProfundoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:ver-users|crear-users|editar-users|borrar-users', ['only' => ['index']]);
         $this->middleware('permission:crear-users', ['only' => ['create','store']]);
         $this->middleware('permission:editar-users', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-users', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $pozoProfundos = PozoProfundo::paginate();

        return view('pozo-profundo.index', compact('pozoProfundos'))
            ->with('i', (request()->input('page', 1) - 1) * $pozoProfundos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pozoProfundo = new PozoProfundo();
        return view('pozo-profundo.create', compact('pozoProfundo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PozoProfundo::$rules);

        $pozoProfundo = PozoProfundo::create($request->all());

        return redirect()->route('pozo-profundos.index')
            ->with('success', 'PozoProfundo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pozoProfundo = PozoProfundo::find($id);

        return view('pozo-profundo.show', compact('pozoProfundo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pozoProfundo = PozoProfundo::find($id);

        return view('pozo-profundo.edit', compact('pozoProfundo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PozoProfundo $pozoProfundo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PozoProfundo $pozoProfundo)
    {
        request()->validate(PozoProfundo::$rules);

        $pozoProfundo->update($request->all());

        return redirect()->route('pozo-profundos.index')
            ->with('success', 'PozoProfundo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pozoProfundo = PozoProfundo::find($id)->delete();

        return redirect()->route('pozo-profundos.index')
            ->with('success', 'PozoProfundo deleted successfully');
    }
}
