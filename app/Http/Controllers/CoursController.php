<?php

namespace App\Http\Controllers;

use App\Models\Dropzone;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CoursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $file = Dropzone::all();

        return view('cours.cours', compact('file'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dropzone $drop, $iddropzone)
    {
        $drop = Dropzone::find($iddropzone);

        return view('cours.cours_details', compact('drop'));
    }
}
