<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Eleve;
use App\Models\Statut;
use App\Models\Utilisateur;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\UserRegistreredNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:utilisateur'],
            'password' => ['required', 'string', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  Utilisateur::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'statut' => $data['statut'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($role =  Statut::create([
            'statut'=>$data['statut'],
            ])
            ){
            $user->professeur()->attach($role);
        }else{
            $roleEleve = Eleve::create([
            'statut' =>$data['statut']
            ]);
            $user->eleve()->attach($roleEleve);
        }

        $user->save();

        //event(new Registered($user));

        $post = ['title'=>'Bienvenue sur Class\'Up',
                 'url'=>'https://classup.tech',
                ];

        $user->notify(new UserRegistreredNotification($user,$post));


        return $user;


    }
}
