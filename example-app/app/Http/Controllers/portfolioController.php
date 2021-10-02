<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portfolioController extends Controller
{
    function portfolioIndex(){

        //$parsonalData=json_decode(parsonalinfomodel::all());
        return view('layout.portfoliopage');

    }
}
