<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Index - Home
    public function Index(){
        return view('templateown.index');
    }//Index Action

    //Login
    public function Login(){
        return view('templateown.meu-login');
    }//Login Action

    //Tela cadastro de novo usuario
    public function NovoCadastro(){
        return view('templateown.novo-cadastro');
    }//Novo cadastro action

}//class
