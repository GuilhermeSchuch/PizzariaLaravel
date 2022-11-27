<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sabores;

class DashboardController extends Controller
{
    public function index(){

        if(session()->has("email")){
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function getSabores(){


    }
}
