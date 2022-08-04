<?php

namespace App\Http\Controllers;

use App\Models\Embalse;
use Illuminate\Http\Request;

/**
 * Class EmbalseController
 * @package App\Http\Controllers
 */
class EmbalseController extends Controller
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
        $embalses = Embalse::paginate();

        return view('embalse.index', compact('embalses'))
            ->with('i', (request()->input('page', 1) - 1) * $embalses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $embalse = new Embalse();
        return view('embalse.create', compact('embalse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Embalse::$rules);

        $embalse = Embalse::create($request->all());

        return redirect()->route('embalses.index')
            ->with('success', 'Embalse created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $embalse = Embalse::find($id);

        return view('embalse.show', compact('embalse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $embalse = Embalse::find($id);

        return view('embalse.edit', compact('embalse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Embalse $embalse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Embalse $embalse)
    {
        request()->validate(Embalse::$rules);

        $embalse->update($request->all());

        return redirect()->route('embalses.index')
            ->with('success', 'Embalse updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $embalse = Embalse::find($id)->delete();

        return redirect()->route('embalses.index')
            ->with('success', 'Embalse deleted successfully');
    }
}
