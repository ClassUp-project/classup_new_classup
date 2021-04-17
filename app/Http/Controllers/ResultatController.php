<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultatController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function create()
    {
        return view('resultat.create');

    }


    public function store()
    {
        $data = request()->validate([
            'nom'=>'required',
            'note'=>'required'

        ]);

        $resultat = auth()->user()->resultat()->create($data);

        return redirect('/resultat/'.$resultat->idresultat);
    }


    public function show()
    {

        $resultats = Resultat::all();


        return view('resultat.show', compact('resultat'));
    }



}
