<?php

namespace App\Http\Controllers;

use App\Models\Dropzone;
use Illuminate\Http\Request;

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

    public function show()
    {
        return view('cours.cours_details');
    }
}
