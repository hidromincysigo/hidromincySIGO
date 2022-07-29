<?php

namespace App\Http\Controllers;

use App\Models\audits;
use Illuminate\Http\Request;

class AuditsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audits = audits::paginate(1);
        return view('auditoria.index',compact('audits'));
    }

}
