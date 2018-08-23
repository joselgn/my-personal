<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Index - Home
    public function Index(){
        return view('templateown.index');
    }//Index

    //Login
    public function Login(){
        return view('templateown.meu-login');
    }


}//class
