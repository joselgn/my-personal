<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function __construct(){
        if(!Auth::check())
            return redirect()->guest('/meu-login/1#content')->with('info','&Eacute; necess&aacute;rio estar logado para acessar a parte administrativa.');
    }//__construct

    //Index - Home
    public function Index(){
        return view('admin.layout-admin');
    }//Index Action


}//class
