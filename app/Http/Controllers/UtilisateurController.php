<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    function login()
    {
        $user = Auth::user();

        return view('layouts.navigation', compact('user'));
    }
}
