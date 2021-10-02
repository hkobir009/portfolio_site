<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parsonalinfomodel;

class aboutController extends Controller
{

    function aboutIndex(){

        $parsonalData=json_decode(parsonalinfomodel::all());
        return view('layout.aboutpage',[
            'parsonalData'=>$parsonalData
        
        ]);

    }
    function parsonalIndex(){
        return view('admin.parsonal');           
    }
  
}
