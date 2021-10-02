<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class deshboardcontroller extends Controller
{
    function deshboardIndex(){

        return view('deshboard');
    }
}
