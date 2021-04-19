<?php

namespace App\Http\Controllers\Auth;

use App\Models\Eleve;
use App\Models\Professeur;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:utilisateur'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Auth::login($user = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));



        if(isset($data['professeur'])){
            $roleProf = new Professeur($data);
            $user->professeur()->save($roleProf);
        }elseif(isset($data['eleve'])){
            $roleEleve = new Eleve($data);
            $user->eleve()->save($roleEleve);
        }

        event(new Registered($user));


        return redirect(RouteServiceProvider::HOME);
    }
}
