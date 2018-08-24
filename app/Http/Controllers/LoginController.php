<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Validador
use Illuminate\Validation\Validator;

//Criando login proprio - Autenticaçao propria
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Sessao
use Illuminate\Support\Facades\Session;

//Database - Credential to login
use App\Models\Usuario;

class LoginController extends Controller{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/painel';

    //Define the username
    public function username(){
        return 'TX_LOGIN';
    }//username

    //Entrar Action
    public function Entrar(Request $request){
        
    }//entrar
}//Class
