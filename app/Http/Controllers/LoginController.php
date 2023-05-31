<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    //
    public function registro(Request $request){

        //VALIDAR PENDIENTE
        $datos = $request->validate(
            [
                'name' => [
                    'required',
                     'alpha_dash',
                     Rule::unique('users'),
                ],
                'email' => ['required', 'email', Rule::unique('users')],
                'password' => ['min:8'],
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        //return redirect(route('privada'));
        $formularios = Formulario::all();
        return view('home', compact('formularios'));
    }

    public function ingreso(Request $request){
        //VALIDAR PENDIENTE
        $credentials = [
            "email" => $request->email,
            "password"=> $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials,$remember)){

            $request->session()->regenerate();
            //return redirect()->intended(route('privada'));
            $formularios = Formulario::all();
            return view('home', compact('formularios'));


        }else{
            return redirect(route('ingreso'));
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('ingreso'));
    }
}
