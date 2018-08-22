<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Index
    public function Index(){
        return view('templateown.index');
    }

}//class
