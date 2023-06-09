<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($request->tipoAcesso == 1)
    {
        $userDocente = User::create([
            'name' => $request->name,
            'docente' => true,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'FirstAccess' => true,
        ]);

        event(new Registered($userDocente));
    }
    else{
        $userDiscente = User::create([
            'name' => $request->name,
            'discente' => true,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'FirstAccess' => true,
        ]);

        event(new Registered($userDiscente));
        }

    return redirect(RouteServiceProvider::HOME)->with('success-message','Usuário cadastrado com sucesso.');
    }
}
