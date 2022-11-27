<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Auth;

class AuthController extends Controller
{
    public function index() {
        return view("login");
    }

    public function auth(Request $request){
        $data = $request;

        if($data["email"] == "pizzariadojoao@gmail.com" && $data["password"] == "joao1234") {
            session(["email" => $data['email']]);
            session(["password" => $data['password']]);

            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }
}
