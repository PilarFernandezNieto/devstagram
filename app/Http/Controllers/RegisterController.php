<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request);
        // dd($request->get('username'));

        // Modificar el request para que coja la validación de username único
        $request->request->add(['username' => Str::slug($request->username) ]); // el helper slug se salta la validación de username duplicados

        // Validación formulario
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);



        // Crea usuario
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);



    }
}
