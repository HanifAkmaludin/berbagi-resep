<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(){
        return view('auth.register');
    }

    public function signup(Request $request){
        $data = [
            'nama' => $request->input("nama"),
            'email' => $request->input("email"),
            'password' => $request->input("password"),
        ];

        $newUser = Users::query()->where('email', $data["email"])->first();
        if($newUser != null){
            return redirect()->back()->withErrors([
                'msg' => "Email sudah terdaftar"
            ]);
        }

        Users::query()->create($data);
        return redirect()->route('login')->with("success", "Register succesfully");
    }

    public function login(){
        return view('auth.login');
    }
    public function signin(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");
        $user = Users::query()->where('email', $email)->first();
        if($user == null){
            return redirect()->route("login")->withErrors([
                'msg' => "Email tidak ditemukan"
            ]);
        }

        if(!Hash::check($password, $user->password)){
            return redirect()->route("login")->withErrors([
                'msg' => "Password Salah"
            ]);
        }

        if(!session()->isStarted()) session()->start();
        session()->put('logged', true);
        session()->put('idUser', $user->id);
        session()->put('idUserRole', $user->roles_id);
        return redirect()->route('resep.list');
    }

    public function logout(Request $request){
        session()->flush();
        return redirect()->route("homepage");
    }
}
