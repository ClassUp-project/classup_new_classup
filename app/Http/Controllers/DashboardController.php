<?php

namespace App\Http\Controllers;

use App\Models\Dropzone;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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


        return view('dashboard', compact('questionnaires', 'idFile'));
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




}
