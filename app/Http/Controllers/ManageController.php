<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(){
        if(session()->has("email")){
            return view('manage');
        }
    }
}
