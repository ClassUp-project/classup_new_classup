<?php

namespace App\Http\Controllers;

use App\Models\Dropzone;
use App\Models\Resultat;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Statut;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {

        $questionnaires = auth()->user()->questionnaires;
        $idFile = auth()->user()->imageFileUpload;
        $resultat = auth()->user()->resultat;
        $user = Statut::with('utilisateur')->where('statut','=','eleve')->get();

        return view('dashboard', compact('questionnaires', 'idFile', 'resultat', 'user'));
    }




    public function download(Dropzone $idFile, $iddropzone){


        $idFile = Dropzone::find($iddropzone);


        return Storage::disk('files')->download($idFile->original);


     }




    public function destroy(Questionnaire $questionnaire)
      {
            $questionnaire->questions()->delete();

            $questionnaire->delete();


            return redirect('/dashboard');

      }


      public function delete(Dropzone $dropzone){

        //delete the file
        File::delete([
            public_path($dropzone->original),
            public_path($dropzone->thumbnail),
        ]);


        //delete record database
        $dropzone->delete();

        //redirect
        return redirect('/dashboard');


    }


    public function deletenote(Resultat $resultat){

        $resultat->delete();

        return redirect('/dashboard');

    }




}
