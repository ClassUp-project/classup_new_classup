<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dropzone;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

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
    public function show($id)
    {
        $drop = Dropzone::with('questionnaireid')->find($id);


        //dd($questionnaire);

        return view('cours.cours_details', compact('drop'));
    }


}
